<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Brand;
use App\Traits\UploadTrait;


class BrandRepository
{
    use UploadTrait;

    public function store($request, $imagePath)
    {
        Brand::create([
            'title' => $request->title,
            'image' => isset($imagePath[0]) ? $imagePath[0] : null,
            'is_active' => $request->is_active ?? 0,
        ]);
    }

    public function update($request, $id, $imagePath)
    {
        $brands = Brand::find($id);
        $brands->title = $request->title;
        $brands->image = isset($imagePath[0]) ? $imagePath[0] : $brands->image;
        $brands->is_active = $request->is_active ?? 0;
        $brands->save();
    }


    public function destroy($brandId)
    {
        $brand = Brand::findOrFail($brandId);
        $this->deleteFile($brand->image);
        return $brand->delete();
    }

    public function storeImage($request)
    {
        $imagesPaths = [];
        if ($request->has('image') && !is_null($request->image)) {

            if(is_array($request->image))
            {
                $images = $request->image;
            }
            else
            {
                $images_arr = [];
                $images_arr[] = $request->image;
                $images = $images_arr;
            }

            $day = date('d');
            $time = md5(time());

            foreach ($images as $key => $image) {
                //check mime type is video or image
                $type = $this->whatIsMyMimeType($image);
                // create random file names
                $keyGenerate = generateKey();
                // Define folder path
                $folder = 'uploads/brand/' . date('Y') . '/' . date('m');
                //Define file name
                $fullFileName = $keyGenerate . '_' . $day . '_' . $time . '_' . $type;
                $path = $folder . '/' . $fullFileName . '.' . $image->getClientOriginalExtension();

                // Make a file path where image will be stored [ folder path + file name + file extension]
                $this->uploadFile($image, $folder, 'public_uploads', $fullFileName);
                $this->optimizeFile($path, $type);
                $imagesPaths[] = $path;

            }

            return $imagesPaths;
        }
        return null;
    }

}
