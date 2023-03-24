<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('number', __('Number'));
        $grid->column('department', __('Department'));
        $grid->column('supervisor_email', __('Supervisor email'));
        $grid->column('email', __('Email'));

        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));


        $grid->column('accrued_days', __('accrued days'));
        $grid->column('salary', __('salary'));
        $grid->column('sick_days', __('	sick_days'));
        $grid->column('Compassionate_days', __('Compassionate_days'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('number', __('Number'));
        $show->field('department', __('Department'));
        $show->field('supervisor_email', __('Supervisor email'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
    
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->text('number', __('Number'));
        $form->text('department', __('Department'));
        $form->email('supervisor_email', __('Supervisor email'));
        $form->email('email', __('Email'));
        $form->hidden('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
    
        $form->hidden('remember_token', __('Remember token'));

        $form->text('accrued_days', __('Accrued days'));
        $form->text('salary', __('Salary'));
        $form->text('sick_days', __('Sick days'));
        $form->text('Compassionate_days', __('Compassionate days'));

        return $form;
    }
}
