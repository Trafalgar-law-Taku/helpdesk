<?php

namespace App\Admin\Controllers;

use App\Models\videos;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use App\Models\categories;
use App\Models\adverts;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class videoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'videos';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new videos());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('category', __('Category'));
        $grid->column('video', __('Video'));
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
        $show = new Show(videos::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('category', __('Category'));
        $show->field('video', __('Video'));
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
        $form = new Form(new videos());

        $form->text('name', __('Name'));
        $form->select('category','Category')->options(categories::all()->pluck('name','name'));
        $form->url('video', __('Video'));
        $form->textarea('text', __('Text'));

        return $form;
    }
}
