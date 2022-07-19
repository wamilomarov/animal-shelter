<?php

namespace App\Admin\Controllers;

use App\Models\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class TypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Type';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Type());

        $grid
            ->disableExport()
            ->disableRowSelector()
            ->disableColumnSelector()
            ->disableBatchActions()
            ->disableFilter()
            ->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableView();
            });

        $grid->column('name', __('Name'));
        $grid->column('vet_cost', __('Vet cost'));
        $grid->column('base_cost', __('Base cost'));

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Type());

        $form
            ->disableViewCheck()
            ->disableEditingCheck()
            ->disableCreatingCheck()
            ->tools(function (Form\Tools $tools) {
                $tools->disableView();
            });

        $form->text('name', __('Name'));
        $form->color('color', __('Color'));
        $form->currency('vet_cost', __('Vet cost'))->symbol('€');
        $form->currency('base_cost', __('Base cost'))->symbol('€');

        return $form;
    }
}
