<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Event;
use App\Models\EventMedia;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;


class EventRepository
{
    use UploadTrait;

    public function store($request, $imagePath)
    {

        $event = Event::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_active' => $request->is_active ?? 0,
        ]);

        EventMedia::create([
            'event_id' => $event->id,
            'media_type' => 'image',
            'media_path' => isset($imagePath[0]) ? $imagePath[0] : null,
        ]);

    }

    public function update($request, $id, $imagePath)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->slug = Str::slug($request->name, '-');
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->is_active = $request->is_active ?? 0;
        $event->save();

        $eventMedia = EventMedia::where('event_id', $event->id)->first();
        $eventMedia->media_path = isset($imagePath[0]) ? $imagePath[0] : $eventMedia->media_path;
        $eventMedia->save();
    }


    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $imagePaths = $event->eventMedia()->pluck('media_path');

        foreach($imagePaths as $imagePath)
        {
            $this->deleteFile($imagePath);
            $this->deleteFile($this->findOriginalFile($imagePath));
            $this->deleteFile($this->findThumbFile($imagePath));
        }

        return $event->delete();
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
                $folder = 'uploads/events/' . date('Y') . '/' . date('m');
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
