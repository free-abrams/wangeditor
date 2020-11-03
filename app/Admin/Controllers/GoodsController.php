<?php

namespace App\Admin\Controllers;

use App\Models\Goods;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Goods';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Goods());

        $table->column('id', __('Id'));
        $table->column('name', __('Name'));
        $table->column('images_url', __('Images url'));
        $table->column('price', __('Price'));
        $table->column('stock', __('Stock'));
        $table->column('sell', __('Sell'));
        $table->column('sort', __('Sort'));
        $table->column('describe', __('Describe'));
        $table->column('goods_number', __('Goods number'));
        $table->column('status', __('Status'));
        $table->column('created_at', __('Created at'));
        $table->column('updated_at', __('Updated at'));
        $table->column('deleted_at', __('Deleted at'));

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Goods::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('images_url', __('Images url'));
        $show->field('price', __('Price'));
        $show->field('stock', __('Stock'));
        $show->field('sell', __('Sell'));
        $show->field('sort', __('Sort'));
        $show->field('describe', __('Describe'));
        $show->field('goods_number', __('Goods number'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Goods());

        $form->text('name', __('Name'));
        $form->textarea('images_url', __('Images url'));
        $form->number('price', __('Price'));
        $form->number('stock', __('Stock'));
        $form->number('sell', __('Sell'));
        $form->number('sort', __('Sort'));
        $form->editor('describe', __('Describe'));
        $form->text('goods_number', __('Goods number'));
        $form->number('status', __('Status'));

        return $form;
    }
}
