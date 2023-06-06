<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'code' => ['required', 'min:2', 'string', 'unique:units,code,NULL,id,deleted_at,NULL'],
            'name' => ['required', 'min:2', 'string', 'unique:units,name,NULL,id,deleted_at,NULL'],
            'base_unit' => ['integer', 'nullable'],
            'operator' => ['min:1', 'max:1', 'string', 'nullable'],
            'operation_value' => ['numeric', 'nullable'],
            'is_active' => ['boolean', 'nullable'],
        ];
    }
}
