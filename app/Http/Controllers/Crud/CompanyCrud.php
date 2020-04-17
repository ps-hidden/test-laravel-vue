<?php

namespace App\Http\Controllers\Crud;

use App\Jobs\NotifyCompany;
use App\Services\Company\UploadLogo;
use App\Http\Requests\Crud\CompanyCrudFr;
use App\Http\Requests\PaginateFr;
use App\Model\Company;

class CompanyCrud
{
    private $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }


    public function index(PaginateFr $fr)
    {
        return $this->model
            ->orderBy(request('orderBy', 'id'), request('orderDir', 'desc'))
            ->paginate(request('perPage'));
    }


    public function show($id)
    {
        return $this->model->find($id) ?? abort(404);
    }


    public function store(CompanyCrudFr $fr, UploadLogo $uploadLogo)
    {
        $model = $this->model->fill(request()->input());
        if (request()->file('logo')) {
            $model->logo = $uploadLogo->handler(request()->file('logo'), $model->logo);
        }
        $model->save();

        NotifyCompany::dispatch(request('name'), request('email'));

        return $model;
    }


    public function update($id, CompanyCrudFr $fr, UploadLogo $uploadLogo)
    {
        $model = $this->show($id);
        $model = $model->fill(request()->input());
        if (request()->file('logo')) {
            $model->logo = $uploadLogo->handler(request()->file('logo'), $model->logo);
        }
        $model->save();
        return $model;
    }


    public function destroy($id)
    {
        return $this->show($id)->delete();
    }


    public function getByName()
    {
        return $this->model->getByName(request('name'));
    }
}
