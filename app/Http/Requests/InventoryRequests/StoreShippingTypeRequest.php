<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShippingTypeRequest extends FormRequest
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
            'is_active' => ['boolean', 'nullable'],
            'shipping_cost' => ['required', 'numeric'],
            'min_shipping_days' => ['required', 'numeric'],
            'max_shipping_days' => ['required', 'numeric'],

        ];
    }
}
