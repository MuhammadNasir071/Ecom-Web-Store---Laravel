<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'country'  =>  ['required'],
            'states'  =>  ['required'],
            'city'  =>  ['required'],
            'phone_number'  =>  ['required', 'min:11'],
            'address'  =>  ['required', 'string'],
            'company_name'  =>  ['required', 'string'],
            'business_type'  =>  ['required'],
        ];
    }
}
