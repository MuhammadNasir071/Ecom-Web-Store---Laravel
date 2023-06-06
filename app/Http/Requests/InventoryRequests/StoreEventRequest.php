<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'string'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'nullable'],
            'is_active' => ['boolean', 'nullable'],
        ];
    }
}
