<?php

namespace App\Http\Controllers\Crud;

use App\Http\Requests\Crud\EmployeeCrudFr;
use App\Http\Requests\PaginateFr;
use App\Model\Employee;

class EmployeeCrud
{
    private $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }


    public function index(PaginateFr $fr)
    {
        return $this->model
            ->with('company:id,name,logo')
            ->orderBy(request('orderBy', 'id'), request('orderDir', 'desc'))
            ->paginate(request('perPage'));
    }


    public function show($id)
    {
        return $this->model->find($id) ?? abort(404);
    }


    public function store(EmployeeCrudFr $fr)
    {
        $model = $this->model->fill(request()->input());
        $model->save();
        return $model;
    }


    public function update($id, EmployeeCrudFr $fr)
    {
        $model = $this->show($id);
        $model = $model->fill(request()->input());
        $model->save();
        return $model;
    }


    public function destroy($id)
    {
        return $this->show($id)->delete();
    }
}
