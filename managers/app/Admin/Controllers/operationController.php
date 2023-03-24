<?php

namespace App\Admin\Controllers;

use App\Models\operations;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class operationController extends AdminController
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
        $grid->column('slug', __('Slug'));
        $grid->column('number', __('Number'));
        $grid->column('department', __('Department'));
        $grid->column('type', __('Type'));
        $grid->column('from', __('From'));
        $grid->column('to', __('To'));
        $grid->column('days', __('Days'));
        $grid->column('address', __('Address'));
        $grid->column('signature', __('Signature'));
        $grid->column('date', __('Date'));
        $grid->column('hod', __('Hod'));
        $grid->column('date2', __('Date2'));
      
        $grid->column('accrued', __('Accrued'));
        $grid->column('accrued_days', __('Accrued days'));
        $grid->column('accrued_taken', __('Accrued taken'));
        $grid->column('encashed', __('Encashed'));
        $grid->column('accrued_balance', __('Accrued balance'));
        $grid->column('sick', __('Sick'));
        $grid->column('working_days_sick', __('Working days sick'));
        $grid->column('sick_taken', __('Sick taken'));
        $grid->column('sick_balance', __('Sick balance'));
        $grid->column('compensation', __('Compensation'));
        $grid->column('compensation_days', __('Compensation days'));
        $grid->column('compensation_taken', __('Compensation taken'));
        $grid->column('Verified', __('Verified'));
        $grid->column('date-verified', __('Date verified'));
        $grid->column('Gm', __('Gm'));
        $grid->column('date-approved', __('Date approved'));
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
        $show->field('slug', __('Slug'));
        $show->field('number', __('Number'));
        $show->field('department', __('Department'));
        $show->field('type', __('Type'));
        $show->field('from', __('From'));
        $show->field('to', __('To'));
        $show->field('days', __('Days'));
        $show->field('address', __('Address'));
        $show->field('signature', __('Signature'));
        $show->field('date', __('Date'));
        $show->field('hod', __('Hod'));
        $show->field('date2', __('Date2'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('accrued', __('Accrued'));
        $show->field('accrued-days', __('Accrued days'));
        $show->field('accrued-taken', __('Accrued taken'));
        $show->field('encashed', __('Encashed'));
        $show->field('accrued-balance', __('Accrued balance'));
        $show->field('sick', __('Sick'));
        $show->field('working-days-sick', __('Working days sick'));
        $show->field('sick-taken', __('Sick taken'));
        $show->field('sick-balance', __('Sick balance'));
        $show->field('compensation', __('Compensation'));
        $show->field('compensation-days', __('Compensation days'));
        $show->field('compensation-taken', __('Compensation taken'));
        $show->field('Verified', __('Verified'));
        $show->field('date-verified', __('Date verified'));
        $show->field('Gm', __('Gm'));
        $show->field('date-approved', __('Date approved'));

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

      
        $form->radio('hod', __('Signature H.O.D'))->options(['Approved'=> 'YES', 'Denied'=> 'NO']);
        $form->hidden('date2', __('Date2'))->default(date('Y-m-d H:i:s'));
      
        $form->radio('Gm', __('General Manager'))->options(['Approved'=> 'YES', 'Denied'=> 'NO']);
        $form->hidden('date-approved', __('Date approved'))->default(date('Y-m-d H:i:s'));



        return $form;
    }
}
