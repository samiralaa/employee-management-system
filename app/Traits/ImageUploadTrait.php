<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait ImageUploadTrait
{

    public function uploadImage(UploadedFile $image, string $directory)
    {
        // Validate the image
        $this->validateImage($image);

        // Store the image and get its path
        return $image->store($directory, 'public');
    }


    protected function validateImage(UploadedFile $image)
    {
        $validator = Validator::make(['image' => $image], [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Customize your validation rules as needed
        ]);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }

    protected function deleteImage($imagePath)
    {
        // Delete the old image from storage
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
