<?php

namespace App\Http\Requests;

use App\Repositories\VoyageRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VoyageUpdateRequest extends FormRequest
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
            'start' => 'nullable|date',
            'end' => 'nullable|date|after:start',
            'revenues' => 'nullable|regex:/^\d{1,6}(\.\d{1,2})?$/',
            'expenses' => 'nullable|regex:/^\d{1,6}(\.\d{1,2})?$/',
            'status'    => ['nullable',
                            Rule::in('pending', 'ongoing', 'submitted')]
        ];
    }
}
