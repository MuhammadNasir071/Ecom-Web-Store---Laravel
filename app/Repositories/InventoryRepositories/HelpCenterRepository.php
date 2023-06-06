<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\HelpCenter;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;


class HelpCenterRepository
{
    use UploadTrait;

    public function store($request)
    {
        HelpCenter::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'order' => $request->order,
            'icon' => $request->queryIcon,
            'is_active' => $request->is_active ?? 0,
            'user_id' => auth()->id(),
        ]);
    }

    public function update($request, $id)
    {
        $helpcenter = HelpCenter::find($id);
        $helpcenter->name = $request->name;
        $helpcenter->slug = Str::slug($request->name, '-');
        $helpcenter->description = $request->description;
        $helpcenter->order = $request->order;
        $helpcenter->icon = $request->queryIcon;
        $helpcenter->is_active = $request->is_active ?? 0;
        $helpcenter->user_id = auth()->id();
        $helpcenter->save();
    }


    public function destroy($id)
    {
        $helpcenter = HelpCenter::findOrFail($id);
        return $helpcenter->delete();
    }

    public function fetchAllActiveHelpCenter()
    {
        return HelpCenter::select('id', 'name', 'slug', 'description', 'order')->active(1)->get();
    }
}
