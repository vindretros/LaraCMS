<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateWordFilterRequest extends FormRequest
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
            'key' => ['required', Rule::unique('wordfilter')->ignore($this->key,'key'),],
            'replacement' => ['required', 'max:16'],
            'hide' => ['required', Rule::in(['0', '1'])],
            'report' => ['required', Rule::in(['0', '1'])],
            'mute' => ['required', 'integer'],
        ];
    }
}
