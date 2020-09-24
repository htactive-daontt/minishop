<?php


namespace App\Ultis;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

class File
{
    public static function upload($file, $path = 'other') {
        $storage = Storage::disk('local');
        $fileName = $file->getClientOriginalName();
        $destinationTarget = $path . '/' . $fileName;
        $count = 0;

        while ($storage->has($destinationTarget)) {
            $count++;
            $destinationTarget = $path . '/' . $count . '-' . $fileName;
        }

        $saved = $storage->put('public/'.$destinationTarget, file_get_contents($file));

        if (!$saved) {
            return false;
        }

        return $destinationTarget;
    }

    public static function delete($file)
    {
        return Storage::delete('public/'.$file);
    }

    public static function getFile($file)
    {
        return Request::root().'/storage/'.$file;
    }
}
