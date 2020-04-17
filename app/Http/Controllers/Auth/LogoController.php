<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LogoFr;

class LogoController
{
    /**
     * Location folder for user logos in storage.
     *
     * @var string
     * @example /storage/user-logo/{user.id}-{timestamp}.{extension}
     */
    private $folder = '/user-logo/';

    /**
     * Upload user logo.
     *
     * @param LogoFr $fr
     * @return array
     */
    public function upload(LogoFr $fr)
    {
        $file = request()->file('logo');
        $user = auth()->user();
        $path = $this->folder . $user->id .'-'. time() .'.'. $file->getClientOriginalExtension();

        if ($user->logo) {
            \Storage::disk('public')->delete($user->logo);
        }

        if (! \Storage::disk('public')->put($path, file_get_contents($file))) {
            abort(500, __('message.upload_logo_failed'));
        }

        $user->logo = $path;
        $user->save();

        return ['message' => __('message.logo_uploaded')];
    }

    /**
     * Delete user logo.
     *
     * @return array
     */
    public function delete()
    {
        $user = auth()->user();

        if ($user->logo) {
            \Storage::disk('public')->delete($user->logo);
        }

        $user->logo = null;
        $user->save();

        return ['message' => __('message.logo_deleted')];
    }

}
