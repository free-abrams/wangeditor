<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsToClassifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_to_classify', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('goods_id')->index()->nullable()->comment('商品ID');
            $table->integer('goods_classify_id')->index()->nullable()->comment('商品分类ID');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_to_classify');
    }
}
