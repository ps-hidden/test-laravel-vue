<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\DataFr;

class DataController
{
    private $canModify = ['name', 'password'];

    /**
     * Update user data
     *
     * @param DataFr $fr
     * @return array
     */
    public function index(DataFr $fr)
    {
        $user = auth()->user();
        foreach (request()->input() as $key => $val) {
            if (in_array($key, $this->canModify)) {
                $user->$key = $val;
            }
        }
        $user->save();

        return ['message' => __('message.user_updated')];
    }
}
