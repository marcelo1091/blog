<?php

namespace App\Services;

class FileUploader
{
    public function upload($file, String $fileSorce)
    {
        //Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $file->getClientOriginalExtension();
        //File Name To Store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload Image
        $path = $file->storeAs($fileSorce, $fileNameToStore);

        return $fileNameToStore;
    }
}
