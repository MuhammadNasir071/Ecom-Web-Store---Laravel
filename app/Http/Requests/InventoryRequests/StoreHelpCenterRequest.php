<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHelpCenterRequest extends FormRequest
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
            'order' => ['required', 'numeric'],
            'queryIcon' => ['required'],

            'description' => ['required','string'],
            'is_active' => ['boolean', 'nullable'],
        ];
    }
}
