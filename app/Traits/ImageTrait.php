<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    public function storeImage($request, $folder, $width = 640, $height = 480)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->hashName();
            Image::make($request->image)->resize($width, $height)->save(public_path("uploads/$folder/$image"));
            return $image;
        }

        return null;
    }

    public function deleteImage($image, $folder, $disk = 'uploads'): bool
    {
        if (!is_null($image)) {
            return Storage::disk($disk)->delete("$folder/$image");
        }

        return false;
    }

    public function updateImage($request, $image, $folder, $disk = 'uploads', $width = 640, $height = 480)
    {
        if ($request->hasFile('image')) {
            $this->deleteImage($image, $folder, $disk);

            return $this->storeImage($request, $folder, $width, $height);
        } else {
            return $image;
        }
    }
}
