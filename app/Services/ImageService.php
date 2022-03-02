<?php

namespace App\Services;

use InterventionImage;
use Illuminate\Support\Facades\Storage;


class ImageService
{
    public static function uploadHeaderImage($headerImageFile){
        if(!is_null($headerImageFile) && $headerImageFile->isValid()){
            // Storage::putFile('public/headers', $headerImageFile);

            $fileNameForHeader = uniqid(rand(),'_');
            $headerExtension = $headerImageFile->extension();
            $headerToStore = $fileNameForHeader.'.'.$headerExtension; 

            $resizedHeaderImage = InterventionImage::make($headerImageFile)
            ->resize(1200, 500)->encode();

            Storage::put('public/headers/' . $headerToStore, $resizedHeaderImage);

            return $headerToStore;
        }
    }

    public static function uploadIconImage($iconImageFile){
        if(!is_null($iconImageFile) && $iconImageFile->isValid()){
            // Storage::putFile('public/icons', $iconImageFile);

            $fileNameForIcon = uniqid(rand(),'_');
            $iconExtension = $iconImageFile->extension();
            $iconToStore = $fileNameForIcon.'.'.$iconExtension; 

            $resizedIconImage = InterventionImage::make($iconImageFile)
            ->resize(500, 500)->encode();

            Storage::put('public/icons/' . $iconToStore, $resizedIconImage);

            return $iconToStore;
        }
    }
}