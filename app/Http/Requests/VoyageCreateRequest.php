<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoyageCreateRequest extends FormRequest
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
            'vessel_id'    => 'required|integer',
            'start' => 'required|date',
            'end' => 'nullable|date|after:start',
            'revenues' => 'nullable|regex:/^\d{1,6}(\.\d{1,2})?$/',
            'expenses' => 'nullable|regex:/^\d{1,6}(\.\d{1,2})?$/'

        ];
    }
}
