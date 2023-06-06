<?php

namespace App\Http\Requests\InventoryRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitRequest extends FormRequest
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
            'code' => ['required', 'min:2', 'string', Rule::unique('units')->where(fn ($query) => $query->where('id', '!=', $this->unit->id)->where('deleted_at', null))],
            'name' => ['required', 'min:2', 'string', Rule::unique('units')->where(fn ($query) => $query->where('id', '!=', $this->unit->id)->where('deleted_at', null))],
            'base_unit' => ['integer', 'nullable'],
            'operator' => ['min:1', 'max:1', 'string', 'nullable'],
            'operation_value' => ['numeric', 'nullable'],
            'is_active' => ['boolean', 'nullable'],
        ];
    }
}
