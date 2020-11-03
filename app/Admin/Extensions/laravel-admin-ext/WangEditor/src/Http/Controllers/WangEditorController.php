<?php

namespace FreeAbrams\WangEditor\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class WangEditorController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('WangEditor::index'));
    }

    public function imageUpload(Request $request)
    {
        $files = $request->file("wangpic");
        $res   = ['errno' => 1, 'errmsg' => '上传图片错误'];
        $data  = [];
        foreach ($files as $key => $file) {
            $ext  = strtolower($file->extension());
            $exts = ['jpg', 'png', 'gif', 'jpeg'];
            if (!in_array($ext, $exts)) {
                $res = ['errno' => 1, 'errmsg' => '请上传正确的图片类型，支持jpg, png, gif, jpeg类型'];
                return Response::json($res);
            } else {
            	$fileNewName = time() . mt_rand(0, 1000);
                $filename = $fileNewName . "." . $ext;
                $filepath = 'uploads/images/wangeditor' . date('Ym') . '/';
                if(config('filesystems.default') === 'oss') {
            		$data[] = env('ALIOSS_HOST').'/'.Storage::put('', $file);
            	} else {
            		if (!file_exists($filepath)) {
                    @mkdir($filepath);
	                }
	                $savepath = config('app.url') . '/' . $filepath . $filename;
	                if ($file->move($filepath, $filename)) {
	                    $data[] = $savepath;
	                }
            	}
            }
        }
        $res = ['errno' => 0, 'data' => $data];
        return Response::json($res);
    }
}
