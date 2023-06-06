<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;


class VendorRepository
{
    use UploadTrait;

    public function store($request, $imagePath)
    {
        $password = generateKey(8, 12);
        $username = 'Vendor-'.generateKey(3, 3). '-'.generateKey(3, 3);

        $newUser = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($password),
            'username' => $username,
            'status' => 'active',
            'email' => $request->email,
            'country_id ' => $request->country,
            'state_id ' => $request->states,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'fax' => $request->fax,
            'profile_picture' => isset($imagePath[0]) ? $imagePath[0] : null,
            'company_name' => $request->company_name,
            'business_type_id  ' => $request->business_type,
            'company_url' => $request->company_url,
            'address' => $request->address,
        ]);

        $newUser->roles()->attach(2);
    }

    public function update($request, $imagePath)
    {
        $user = User::findOrFail($request->id);
        if($user)
        {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->country_id = $request->country;
            $user->state_id = $request->states;
            $user->city = $request->city;
            $user->phone_number = $request->phone_number;
            $user->fax = $request->fax;
            $user->zip_code = $request->zip_code;
            $user->address = $request->address;
            $user->profile_picture = isset($imagePath[0]) ? $imagePath[0] : $user->profile_picture;
            $user->company_name = $request->company_name;
            $user->business_type_id = $request->business_type;
            $user->company_url = $request->company_url;
            $user->save();
        }

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
                $folder = 'uploads/profilePic/' . date('Y') . '/' . date('m');
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
