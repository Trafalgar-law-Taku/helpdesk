<?php

namespace App\Admin\Controllers;

use App\Models\projects;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\categories;
use Illuminate\Support\Str ;

class projectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'projects';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new projects());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('tags', __('Tags'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('category', __('Category'));
        $grid->column('image', __('Image'));
        $grid->column('video', __('Video'));
        $grid->column('text', __('Text'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('pick', __('Pick'));
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
        $show = new Show(projects::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('tags', __('Tags'));
        $show->field('keywords', __('Keywords'));
        $show->field('category', __('Category'));
        $show->field('image', __('Image'));
        $show->field('video', __('Video'));
        $show->field('text', __('Text'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('pick', __('Pick'));
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
        $form = new Form(new projects());
        $form->text('name', __('Name'));
        $form->image('image', __('Image'));
        $form->file('video', __('Video'));
        $states = [
            'on'  => ['value' => 0, 'text' => 'image', 'color' => 'success'],
            'off' => ['value' => 1, 'text' => 'Video', 'color' => 'danger'],
        ];
        
        $form->switch('pick' , 'Choose')->states($states);
       
      
        $form->tags('tags', __('Tags'));
        $form->textarea('keywords');
        $form->select('category','Category')->options(categories::all()->pluck('name','name'));
      
    
        $form->text('url', __('Url'));
        $form->ckeditor('text');

        $form->saving(function (Form $form) {


            $slug = Str::slug($form->name, '-') ;
            $form->slug = $slug;
        
        });
        return $form;
    }
}
