<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class ProfileUpdateRequest extends FormRequest
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
    public function rules():array
    {
        return [
            // 'name' => 'required|max:100',
            // 'email' => 'required|string|email|max:100|unique:users',
            // // 'status' => 'sometimes|digits:1',
            // 'phone' => 'sometimes|digits_between:5,20|unique:users,phone',
            // //'birth_date' => 'sometimes|date_format:Y-m-d',
            // //'role' => 'required|between:2,100',
            // 'password' => 'sometimes|confirmed|min:6',
            // //'image'=>'required|image|mimes:jpg,png,jpeg,webp','max:2048',
            'name' => 'required|string|between:3,100',

        ];
    }
}
