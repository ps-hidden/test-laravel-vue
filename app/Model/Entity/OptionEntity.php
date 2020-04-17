<?php

namespace App\Model\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $id
 * @property string $value
 * @property bool $is_json
 * @property bool $init
 *
 * @mixin Builder
 */
class OptionEntity extends Model
{
    protected $table = 'options';

    public $timestamps = false;

    protected $perPage = 10;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = ['id', 'value'];

    protected $hidden = ['is_json', 'init'];

    public function getValueAttribute($value)
    {
        return $this->is_json ? json_decode($value) : $value;
    }

    public function setValueAttribute($value)
    {
        $is_json = is_array($value) || is_object($value);
        $this->attributes['value'] = $is_json ? json_encode($value) : $value;
        $this->attributes['is_json'] = $is_json;
    }
}
