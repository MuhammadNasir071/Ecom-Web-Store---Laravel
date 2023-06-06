<?php

namespace App\Repositories\UserRepositories;

use App\Traits\UploadTrait;
use App\Models\User;

class UserRepository
{
    use UploadTrait;

    public function getUser()
    {
        return User::where('id', auth()->id())->first();
    }

    public function update($request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->profile_picture = isset($imagePath[0]) ? $imagePath[0] : $user->profile_picture;
        $user->save();
    }

    // Update user profile pic 
    public function updateProfilePicture($id, $imagePath)
    {
        $user = User::find($id);
        $user->profile_picture = isset($imagePath[0]) ? $imagePath[0] : $user->profile_picture;
        $user->save();
    }

    // upload profile picture 
    public function storeImage($request)
    {
        $imagesPaths = [];
        if ($request->has('image') && !is_null($request->image)) {

            if(is_array($request->image))
            {
                $image = $request->image;
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
                $folder = 'uploads/ProfileImage/' . date('Y') . '/' . date('m');
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
