<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Category;
use App\Models\CategoryPrivacy;
use App\Models\ContactPrivacy;
use App\Models\Privacy;
use Illuminate\Support\Str;


class PrivacyRepository
{
    // Get all active parent privacies
    public function activePrivacyWithLevel($level)
    {
        return Privacy::query()->level($level);
    }

    // Get parent privacy of specific child privacy
    public function getParentPrivacy($id)
    {
        return Privacy::where('id', $id);
    }


    // Store privacies 
    public function store($request)
    {
        $parentPrivacyId = $request->parent_id;
        Privacy::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'parent_id' => $parentPrivacyId > 0 ? $parentPrivacyId : null,
            'level' => $parentPrivacyId > 0 ? Privacy::find($parentPrivacyId)->level + 1 : 0,

            'is_active' => $request->is_active ?? 0,
            'user_id' => auth()->id(),
        ]);
    }

    // Show specific Privacy 
    public function show($id)
    {
        return Privacy::findOrFail($id);
    }

    // Fetch all privacies active/deactive 
    public function fetchAllPrivacy()
    {
        return Privacy::query();
    }

    //update privacy
    public function update($request, $id)
    {
        $parentPrivacyId = $request->parent_id;

        $privacy = Privacy::find($id);
        $privacy->name = $request->name;
        $privacy->slug = Str::slug($request->name, '-');
        $privacy->parent_id = $parentPrivacyId;
        $privacy->level  = $parentPrivacyId > 0 ? Privacy::find($parentPrivacyId)->level + 1 : 0;
        $privacy->is_active = $request->is_active ?? 0;
        $privacy->user_id = auth()->id();
        $privacy->save();
    }

    public function destroy($id)
    {
        $privacy = Privacy::findOrFail($id);
        return $privacy->delete();
    }

    // set privacy to product category
    public function setCategoryPrivacy($request)
    {
        $categories_privacy = $request->all();
        // $category_privacy = $request->category_privacy;

        foreach($categories_privacy as $category_privacy)
        {
            if($single_privacy = Privacy::where('id', $category_privacy['privacy_id'])->first()){
                if(!is_null($category_privacy['category'])){
                    $single_privacy->categoryPrivacy()->sync($category_privacy['category']);             // In sync() method defalt 2nd parameter true.
                }
                else
                {
                    $single_privacy->categoryPrivacy()->sync([]);             // In detach() method defalt 2nd parameter true.   
                } 
            }
        }
    }

    // get contact privacy 
    public function getContactPrivacy($contact_id)
    {
        $contactPrivacy = ContactPrivacy::where('contact_id', $contact_id)->first();
        return Privacy::where('id', $contactPrivacy->privacy_id);   
    }

    // get contact privacy 
    public function getPrivacyCategory($privacy_id)
    {
        $categoryPrivacyIds = CategoryPrivacy::where('privacy_id', $privacy_id)->pluck('category_id');
        return Category::whereIn('id', $categoryPrivacyIds)->level(0);
       
    }

    // get contact privacy categories
    public function fetchContactPrivacyCategories($contact_id)
    {
        $contactPrivacy = ContactPrivacy::where('contact_id', $contact_id)->first();
        $categoryPrivacyIds = CategoryPrivacy::where('privacy_id', $contactPrivacy->privacy_id)->pluck('category_id');
        if(isset($categoryPrivacyIds) && count($categoryPrivacyIds) > 0){
            return Category::whereIn('id', $categoryPrivacyIds)->level(0);
        }
        else
        {
            return Category::query()->level(0);
        }
        
        
    }
}
