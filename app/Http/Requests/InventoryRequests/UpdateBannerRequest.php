<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'name' => ['required','min:3', 'string'],
            'order' => ['required', 'numeric', 'min:0','lte:10'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'is_active' => ['boolean', 'nullable'],
        ];
    }
}
