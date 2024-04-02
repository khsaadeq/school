<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class GuardianRequest extends FormRequest
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
            'name' => 'required|string|between:3,100|unique:parents',
            'gender_id' => 'required|digits:1',
            'job' => 'required|string|max:100',
            'social_status' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:parents',
            // 'email'  => 'required|string|unique:parents',
            'phone' => 'required|digits_between:5,20|unique:parents',
            'password' => 'required|string|confirmed|min:6',
        ];
    }
}
