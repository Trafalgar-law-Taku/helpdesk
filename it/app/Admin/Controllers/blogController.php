<?php

namespace App\Admin\Controllers;

use App\Models\blogs;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use App\Models\categories;
use Illuminate\Support\Str ;
use App\Models\adverts;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class blogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'blogs';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new blogs());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('author', __('Author'));
        $grid->column('position', __('Position'));
        $grid->column('tags', __('Tags'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('category', __('Category'));
        $grid->column('image', __('Image'));
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
        $show = new Show(blogs::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('author', __('Author'));
        $show->field('position', __('Position'));
        $show->field('tags', __('Tags'));
        $show->field('keywords', __('Keywords'));
        $show->field('category', __('Category'));
        $show->field('image', __('Image'));
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
        $form = new Form(new blogs());

        $form->image('image');
        $form->file('video');

        $states = [
            'on'  => ['value' => 0, 'text' => 'image', 'color' => 'success'],
            'off' => ['value' => 1, 'text' => 'Video', 'color' => 'danger'],
        ];
        
        $form->switch('pick' , 'Choose')->states($states);
       

        $form->text('name');
        $form->text('author');
        $form->hidden('slug');
        $form->select('position', 'Position')->options(['None','Breaking' => 'Breaking', 'Top'=> 'Top','Normal' => 'Normal']);
        $form->select('category','Category')->options(categories::all()->pluck('name','name'));


        $form->select('ad1','ad1')->options(adverts::all()->pluck('name','name'));
        $form->select('ad2','ad2')->options(adverts::all()->pluck('name','name'));
        $form->select('ad3','ad3')->options(adverts::all()->pluck('name','name'));

        $form->textarea('keywords');
        $form->tags('tags');

        
        $form->text('url');
 

      $form->ckeditor('text');

      
      $form->saving(function (Form $form) {


        $slug = Str::slug($form->name, '-') ;
        $form->slug = $slug;
    
    });
        return $form;
    }
}
