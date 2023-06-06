<?php

namespace App\Http\Requests\ContactRequests;

use Illuminate\Foundation\Http\FormRequest;

class ImportContactsRequest extends FormRequest
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
            'contacts' => ['required', 'array'],
            'contacts.name.*' => ['required', 'min:2', 'string'],
            'contacts.contact_number.*' => ['required', 'string'],
        ];
    }
}
