<?php

namespace App\Admin\Controllers;

use App\Models\packages;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\services;

use Illuminate\Support\Str ;

class packageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'packages';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new packages());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('tags', __('Tags'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('service', __('Service'));
        $grid->column('image', __('Image'));
        $grid->column('text', __('Text'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('url', __('Url'));

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
        $show = new Show(packages::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('tags', __('Tags'));
        $show->field('keywords', __('Keywords'));
        $show->field('service', __('Service'));
        $show->field('image', __('Image'));
        $show->field('text', __('Text'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('url', __('Url'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new packages());

        $form->text('name', __('Name'));
        $form->image('image', __('Image'));
        $form->tags('tags', __('Tags'));
        $form->textarea('keywords', __('Keywords'));
   

        
        $form->select('service','Service')->options(services::all()->pluck('slug','slug'));
       
      
        $form->text('url', __('Url'));

        $form->list('text', __('List'));
        $form->hidden('slug');

        $form->number('price', __('Price'));

        $form->saving(function (Form $form) {


            $slug = Str::slug($form->name, '-') ;
            $form->slug = $slug;
        
        });
        return $form;
    }
}
