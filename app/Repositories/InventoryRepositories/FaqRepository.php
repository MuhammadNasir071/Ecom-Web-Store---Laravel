<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Faq;
use App\Models\HelpCenter;
use App\Traits\UploadTrait;


class FaqRepository
{
    use UploadTrait;

    public function store($request)
    {
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order,
            'is_active' => $request->is_active ?? 0,
            'user_id' => auth()->id(),
        ]);
    }

    public function update($request, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->order = $request->order;
        $faq->is_active = $request->is_active ?? 0;
        $faq->user_id = auth()->id();
        $faq->save();
    }


    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        return $faq->delete();
    }

    public function fetchAllActiveFAQs()
    {
        return FAQ::select('id', 'question', 'answer', 'order')->active(1);
    }
    public function fetchAllHelpCenterQueries()
    {
        return HelpCenter::select('id', 'name', 'description', 'order', 'icon')->active(1);
    }

}
