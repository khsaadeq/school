<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        return [
            'user_name' => 'required|string|between:3,100',
            'email' => 'required|string|email|max:100|unique:users',
            // 'phone' => 'required|digits_between:5,20|unique',
            'password' => 'required|string|confirmed|min:6|unique:users,password',
        ];
    }
}
