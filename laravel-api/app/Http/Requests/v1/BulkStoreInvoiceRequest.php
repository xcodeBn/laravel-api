<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //

            [
                '*.customerId' => ['required', 'numeric'],
                '*.amount' => ['required'],
                '*.status' => ['required', Rule::in(['b', 'B', 'p', 'P', 'v', 'V'])],
                '*.billedDate' => ['required'],
                '*.paidDate' => ['nullable'],
            ]
        ];
    }

    public function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $i) {
            $i['customer_id'] = $i['customerId'] ?? null;
            $i['paid_date'] = $i['paidDate'] ?? null;
            $i['billed_date'] = $i['billedDate'] ?? null;

            $data[] = $i;
        }

        $this->merge($data);
    }
}
