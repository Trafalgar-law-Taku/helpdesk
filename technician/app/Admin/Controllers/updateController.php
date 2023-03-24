<?php

namespace App\Admin\Controllers;

use App\Models\updates;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class updateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'updates';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new updates());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('date', __('Date'));
        $grid->column('time', __('Time'));
        $grid->column('image', __('Image'));
        $grid->column('text', __('Text'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(updates::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('date', __('Date'));
        $show->field('time', __('Time'));
        $show->field('image', __('Image'));
        $show->field('text', __('Text'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new updates());

        $form->text('name', __('Name'));
        $form->date('date', __('Date'));
        $form->time('time', __('Time'));
        $form->image('image', __('Image'));
        $form->ckeditor('text');


        return $form;
    }
}
