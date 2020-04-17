<?php

namespace App\Model;

class Company extends Entity\CompanyEntity
{
    public function getByName($name)
    {
        return $this->where('name', 'LIKE', "%{$name}%")
            ->limit(10)
            ->pluck('name', 'id');
    }
}
