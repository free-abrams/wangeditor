<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SortController extends Controller
{
    public function quickSort(Request $request)
    {
        $data = $request->post();

        $data['data'] = json_decode($data['data'], true);

        $sortData = $this->doQuickSort($data['data']);

        return Response::json(['code' => 200, 'data' => $sortData]);
    }

    public function doQuickSort($data = [])
    {
        $count = count($data);
        if (!$count) {
            return false;
        }
        $this->quickSortMain($data , 0, $count - 1);
        return $data;
    }

    public function quickSortMain(&$data, $index = 0, $length)
    {
        if ($index >= $length) {
            return $data;
        }
        $pivot = $this->partition($data, $index, $length);
        $this->quickSortMain($data, $index, $pivot - 1);
        $this->quickSortMain($data, $pivot + 1, $length);
    }

    // 寻找pivot
    function partition(&$nums, $p, $r)
    {
        $pivot = $nums[$r];
        $i = $p;
        for ($j = $p; $j < $r; $j++) {
            // 原理：将比$pivot小的数丢到[$p...$i-1]中，剩下的[$i..$j]区间都是比$pivot大的
            if ($nums[$j] < $pivot) {
                $temp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j] = $temp;
                $i++;
            }
        }

        // 最后将 $pivot 放到中间，并返回 $i
        $temp = $nums[$i];
        $nums[$i] = $pivot;
        $nums[$r] = $temp;

        return $i;
    }
}
