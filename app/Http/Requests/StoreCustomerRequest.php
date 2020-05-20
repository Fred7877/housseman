<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCustomerRequest
 * @package App\Http\Requests
 */
class StoreCustomerRequest extends FormRequest
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
            'siret' => 'numeric',
            'email' => 'required|email|unique:customers',
            'name' => 'required|unique:organizations',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Un email est obligatoire',
            'email.unique' => 'Cette adresse exist déjà.',
            'siret.numeric' => 'Le siret ne doit contenir que des chiffres',
            'name.unique' => 'Une entreprise porte déjà ce nom',
        ];
    }
}
