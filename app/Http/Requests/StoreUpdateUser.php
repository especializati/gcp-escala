<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255'
            ],
            'email' => [
                'unique:users',
                'max:255'
            ],
            'password' => [
                'required',
                'min:6',
                'max:100'
            ]
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:100'
            ];
        }

        return $rules;
    }
}
