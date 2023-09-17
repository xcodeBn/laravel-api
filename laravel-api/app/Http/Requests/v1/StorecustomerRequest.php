<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorecustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'type' =>  ['required', Rule::in(['i', 'I', 'b', 'B'])],
            'email' =>  ['required', 'email'],
            'address' =>  ['required'],
            'city' =>  ['required'],
            'state' =>  ['required'],
            'postalCode' =>  ['required']

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['postal_code' => $this->postalCode]);
    }
}
