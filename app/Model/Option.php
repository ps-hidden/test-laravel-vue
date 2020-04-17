<?php

namespace App\Model;

class Option extends Entity\OptionEntity
{
    /** Get all initial options */
    public function init()
    {
        return $this
            ->where('init', 1)
            ->get(['id', 'value', 'is_json'])
            ->pluck('value', 'id');
    }

    /**
     * Get option value
     *
     * @param string $name
     * @param mixed $default
     * @return mixed|null
     */
    public static function getValue($name, $default = null)
    {
        $item = self::find($name);

        return $item ? $item->value : $default;
    }

    /**
     * Get options by `id`
     *
     * @param array $data - array of ids (or part of id with %)
     * @return mixed
     */
    public static function getValues($data)
    {
        return self::where(function ($query) use ($data) {
            foreach ($data as $key) {
                $query->orWhere('id', 'LIKE', $key);
            }
        })->pluck('value', 'id');
    }

    /**
     * Save options
     *
     * @param array $array
     * @return void
     */
    public static function setValues($array)
    {
        foreach ($array as $key => $val) {
            self::updateOrCreate([ 'id' => $key ], [ 'value' => $val ]);
        }
    }
}
