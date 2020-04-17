<?php

namespace App\Model\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $logo
 * @property string $website
 *
 * @mixin Builder
 * @mixin Model
 */
class CompanyEntity extends Model
{
    protected $table = 'companies';

    public $timestamps = false;

    protected $perPage = 10;

    protected $fillable = ['name', 'email', 'logo', 'website'];

    protected $hidden = ['logo'];

    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo
            ? config('app.url') .'/storage'. $this->logo
            : null;
    }

    public function employees()
    {
        return $this->hasMany(EmployeeEntity::class, 'id', 'company_id');
    }
}
