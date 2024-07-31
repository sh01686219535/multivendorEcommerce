<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {

        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $text = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $text;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }
    }
    public function updadeImage(Request $request, $inputName, $path, $oldPth = null)
    {

        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPth))) {
                File::delete(public_path($oldPth));
            }
            $image = $request->{$inputName};
            $text = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $text;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }
    }
    private function multipleImgUpload(Request $request, $key, $path)
    {
        $imgPth = [];
        if($request->hasFile($key)) {
            foreach ($request->file($key) as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($path), $filename);
                $imgPth[] = $path . '/' . $filename;
            }
        }
        return $imgPth;
    }
    public function delteItem(string $path)
    {

        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
