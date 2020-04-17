<?php

namespace App\Services\Company;

use Illuminate\Support\Str;

class UploadLogo
{
    private $logoFolder = '/company-logo/';

    public function handler($file, $oldLogo)
    {
        $path = $this->upload($file);

        if ($path and $oldLogo) {
            \Storage::disk('public')->delete($oldLogo);
        }

        return $path ?? $oldLogo;
    }

    private function upload($file)
    {
        $path = $this->logoFolder . Str::random(32) .'-'. time() .'.'. $file->getClientOriginalExtension();

        if (! \Storage::disk('public')->put($path, file_get_contents($file))) {
            return null;
        }

        return $path;
    }
}
