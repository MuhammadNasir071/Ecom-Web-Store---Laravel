<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'starts_at' => ['required'],
            'expires_at' => ['required'],
            'code' => ['required'],
            'discount' => ['required'],
            'max_uses' => ['required'],
            'is_active' => ['boolean', 'nullable'],
        ];
    }
}
