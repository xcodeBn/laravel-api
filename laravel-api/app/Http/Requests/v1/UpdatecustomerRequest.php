<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class UpdatecustomerRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'type' =>  ['required', Rule::in(['i', 'I', 'b', 'B'])],
                'email' =>  ['required', 'email'],
                'address' =>  ['required'],
                'city' =>  ['required'],
                'state' =>  ['required'],
                'postalCode' =>  ['required']

            ];
        } else {
            return [
                'name' => ['required', 'sometimes'],
                'type' =>  ['required', Rule::in(['i', 'I', 'b', 'B']), 'sometimes'],
                'email' =>  ['required', 'email', 'sometimes'],
                'address' =>  ['required', 'sometimes'],
                'city' =>  ['required', 'sometimes'],
                'state' =>  ['required', 'sometimes'],
                'postalCode' =>  ['required', 'sometimes'],

            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->get('postalCode'))
            $this->merge(['postal_code' => $this->postalCode]);
    }
}
