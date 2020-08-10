<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class createWordFilterRequest extends FormRequest
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
            'key' => ['required','unique:App\Models\Website\Wordfilter'],
            'replacement' => ['required', 'max:16'],
            'hide' => ['required', Rule::in(['0', '1'])],
            'report' => ['required', Rule::in(['0', '1'])],
            'mute' => ['required', 'integer'],
        ];
    }
}
