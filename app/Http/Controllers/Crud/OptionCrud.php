<?php

namespace App\Http\Controllers\Crud;

use App\Http\Requests\Crud\OptionCrudFr;
use App\Model\Option;

class OptionCrud
{
    private $model;

    public function __construct(Option $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->init();
    }


    public function show($id)
    {
        return $this->model->find($id) ?? abort(404);
    }


    public function store(OptionCrudFr $fr)
    {
        $model = $this->model->fill(request()->only(['id', 'value']));
        $model->save();
        return $model;
    }


    public function update($id)
    {
        $model = $this->show($id);
        $model = $model->fill(request()->only(['value']));
        $model->save();
        return $model;
    }


    public function destroy($id)
    {
        return $this->show($id)->delete();
    }
}
