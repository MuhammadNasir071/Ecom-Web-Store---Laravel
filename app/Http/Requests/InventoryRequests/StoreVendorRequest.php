<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
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
            'first_name' => ['required', 'min:2', 'max:255', 'string'],
            'last_name' => ['required', 'min:2', 'max:255', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_active' => ['boolean', 'nullable'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'nullable'],
        ];
    }
}
