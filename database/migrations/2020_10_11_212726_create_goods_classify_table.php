<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsClassifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_classify', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', '50')->index()->nullable()->comment('标题');
            $table->string('description', '50')->nullable()->comment('描述');
            $table->integer('sort')->index()->nullable()->comment('排序（同级有效）');
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
        Schema::dropIfExists('goods_classify');
    }
}
