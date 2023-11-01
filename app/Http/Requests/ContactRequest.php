<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:contacts',
            'email'   => 'required|email|unique:contacts',
        ];
    }
}
