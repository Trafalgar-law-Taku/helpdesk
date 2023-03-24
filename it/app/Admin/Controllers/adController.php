<?php

namespace App\Admin\Controllers;

use App\Models\adverts;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class adController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'adverts';


    
    /**
     * 
     * 
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new adverts());




        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));

        $grid->column('position', __('Position'));

        $grid->column('page', __('page'));
        $grid->column('image', __('Image'));
        $grid->column('link', __('link'));
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
        $show = new Show(adverts::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new adverts());

        $form->image('image');
        $form->text('name');
        $form->url('link');
        $form->textarea('text');
        $form->select('page', 'Page')->options(['home' => 'home', 'blog'=> 'blog','news' => 'news','contact' => 'contact']);
        $form->select('position', 'Position')->options(['HOME','1' => '1', '2'=> '2','3' => '3','4' => '4','5' => '5','OTHER' => 'other']);
        $form->textarea('google');
        return $form;
    }
}
