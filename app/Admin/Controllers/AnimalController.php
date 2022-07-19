<?php

namespace App\Admin\Controllers;

use App\Models\Animal;
use App\Models\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class AnimalController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Animal';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Animal());

        $grid
            ->disableExport()
            ->disableRowSelector()
            ->disableColumnSelector()
            ->disableBatchActions()
            ->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableView();
            })
            ->filter(function (Grid\Filter $filter) {
                $filter->disableIdFilter();
                $filter->like('name');
                $filter->in('type_id', 'Type')->multipleSelect(Type::query()->pluck('name', 'id'));
            });


        $grid->column('name', __('Name'));
        $grid->column('type_id', __('Type'))->display(function () {
            return "<span class='badge bg-secondary' style='background-color : {$this->type->color} !important; margin-left: 1rem'>
                      #{$this->type->name}
                </span>";
        });
        $grid->column('birthdate', __('Birthdate'))->display(function () {
            return $this->birthdate->toDateString();
        });
        $grid->column('vet_visits', __('Vet visits'));

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Animal());

        $form
            ->disableViewCheck()
            ->disableEditingCheck()
            ->disableCreatingCheck()
            ->tools(function (Form\Tools $tools) {
                $tools->disableView();
            });

        $form->select('type_id', __('Type'))->options(Type::query()->pluck('name', 'id'));
        $form->text('name', __('Name'));
        $form->date('birthdate', __('Birthdate'));
        $form->number('vet_visits', __('Vet visits'));

        return $form;
    }
}
