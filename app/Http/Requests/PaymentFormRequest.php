<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'payment_method' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'cpf' => 'required|string',
        ];

        if ($this->get('payment_method') === 'CREDIT_CARD') {
            $rules = array_merge($rules, [
                'card_number' => 'required|string|max:16',
                'card_expiry' => 'required|string|max:5',
                'card_cvv' => 'required|string|max:4',
            ]);
        }

        return $rules;
    }
}
