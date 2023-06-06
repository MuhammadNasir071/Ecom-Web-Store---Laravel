<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Banner;
use App\Traits\UploadTrait;


class BannerRepository
{
    use UploadTrait;

    public function banners()
    {
        return Banner::where('is_active', 1)->get();
    }

    public function store($request, $imagePath)
    {
        Banner::create([
            'banner_name' => $request->name,
            'order' => $request->order,
            'path' => isset($imagePath[0]) ? $imagePath[0] : null,
            'is_active' => $request->is_active ?? 0,
        ]);
    }

    public function update($request, $id, $imagePath)
    {
        $banner = Banner::find($id);
        $banner->banner_name = $request->name;
        $banner->order = $request->order;
        $banner->path = isset($imagePath[0]) ? $imagePath[0] : $banner->path;
        $banner->is_active = $request->is_active ?? 0;
        $banner->save();
    }


    public function destroy($bannerId)
    {
        $banner = Banner::findOrFail($bannerId);
        $this->deleteFile($banner->path);
        return $banner->delete();
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
                $folder = 'uploads/banners/' . date('Y') . '/' . date('m');
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
