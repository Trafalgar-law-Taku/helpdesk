<?php

namespace App\Admin\Controllers;

use App\Models\operations;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

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
        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
            $actions->disableEdit();
            $actions->disableDelete();
        });

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

        $form->text('name', __('Name'));
        $form->hidden('slug', __('Slug'));
        $form->text('number', __('Employee no'));
        $form->textarea('department', __('Department'));

        $directors = [
            'vacation'  =>  'vacation' ,
            'Sick' =>  'Sick' ,
            'Maternity'  =>  'Maternity',
            'Compassionate'  =>  'Compassionate',
            'Encashment'  => 'Encashment' ,
        ];
        $form->select('type', __('Type'))->options($directors);
        $form->date('from', __('From'));
        $form->date('to', __('To'));
        $form->number('days', __('Days'));
        $form->textarea('address', __('Address'));
        $form->image('signature', __('Signature'));
        $form->hidden('date', __('Date'))->default(date('Y-m-d H:i:s'));

        $form->saving(function ($form) {

            $success = new MessageBag([
                'title'   => 'Thank you ' . $form->name ,
                'message' => 'You will be Contacted via Email once your application is Approved',
            ]);
        
            return back()->with(compact('success'));
        });
        return $form;
    }
}
