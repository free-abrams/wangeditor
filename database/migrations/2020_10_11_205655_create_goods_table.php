<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '190')->index()->nullable()->comment('商品名称');
            $table->text('images_url')->nullable()->comment('封面图片url');
            $table->integer('price')->nullable()->comment('封面价格:单位：分');
            $table->integer('stock')->index()->default(0)->comment('库存');
            $table->integer('sell')->index()->default(0)->comment('已售');
            $table->integer('sort')->index()->nullable()->comment('排序（同级有效）');
            $table->text('describe')->nullable()->comment('商品描述');
            $table->string('goods_number', '190')->index()->nullable()->comment('商品编号');
            $table->integer('status')->index()->nullable()->comment('状态 1.正常、2.休整');
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
        Schema::dropIfExists('goods');
    }
}
