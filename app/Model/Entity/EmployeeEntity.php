<?php

namespace App\Model\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $f_name
 * @property string $l_name
 * @property int $company_id
 * @property string $email
 * @property string $phone
 *
 * @mixin Builder
 * @mixin Model
 */
class EmployeeEntity extends Model
{
    protected $table = 'employees';

    public $timestamps = false;

    protected $perPage = 10;

    protected $fillable = ['f_name', 'l_name', 'company_id', 'email', 'phone'];

    public function company()
    {
        return $this->belongsTo(CompanyEntity::class, 'company_id', 'id');
    }
}
