<?php

namespace App\Admin\Controllers;

use App\Models\operations;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class operationsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'operations';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new operations());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('department', __('Department'));
        $grid->column('problem', __('Problem'));
        $grid->column('description', __('Description'));
        $grid->column('technician', __('Technician'));
        $grid->column('solution', __('Solution'));

        $grid->column('escation', __('Escation'));
        $grid->column('reason', __('Reason'));
        $grid->column('completion', __('Completion'));
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
        $show = new Show(operations::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('department', __('Department'));
        $show->field('problem', __('Problem'));
        $show->field('description', __('Description'));
        $show->field('technician', __('Technician'));
        $show->field('solution', __('Solution'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('escation', __('Escation'));
        $show->field('reason', __('Reason'));
        $show->field('completion', __('Completion'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new operations());



        $form->switch('escation', 'Escalate?');

      
        $form->textarea('reason', __('Reason for escalation'));
       
        $form->switch('completion', 'Complete?');
        $form->textarea('solution', __('Solution'));
        return $form;
    }
}
