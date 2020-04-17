<?php

namespace App\Traits;

trait DisableAppends
{
    public static $disableAppends = false;

    protected function getArrayableAppends()
    {
        return self::$disableAppends ? [] : parent::getArrayableAppends();
    }
}
