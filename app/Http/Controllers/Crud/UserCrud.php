<?php

namespace App\Http\Controllers\Crud;

use App\Http\Requests\PaginateFr;
use App\Http\Requests\Crud\UserCrudFr;
use App\Model\User;

class UserCrud
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }


    public function index(PaginateFr $fr)
    {
        return $this->model
            ->orderBy(request('orderBy', 'id'), request('orderDir', 'asc'))
            ->paginate(request('perPage'));
    }


    public function show($id)
    {
        return $this->model->find($id) ?? abort(404);
    }


    public function store(UserCrudFr $fr)
    {
        $model = $this->model->fill(request()->input());
        $model->save();
        return $model;
    }


    public function update($id, UserCrudFr $fr)
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
