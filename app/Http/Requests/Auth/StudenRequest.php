<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StudenRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:students',
            'address' => 'required|string|max:50',
            'school' => 'required|string|max:50',
            'identity_id'=>'required|integer',
            'number_identity' => 'required|digits_between:5,20',
            // 'gender_id' => 'required|digits:1',
            'nationality_id'=>'required|integer',
            'guardian_id'=>'required|digits:1',
            'link_kinship' => 'required|string|max:100',
            'previous_save' => 'required|string|max:50',
            'date_Join' => 'required|date_format:Y-m-d',
            'quran_episod_id'=>'required|integer',
            // 'image'=>'null',
            'birth_date' => 'required|date_format:Y-m-d',
            'email'  => 'required|string||max:100|unique:students',
            'phone' => 'required|digits_between:5,20|unique:students,phone',
            'password' => 'required|string|confirmed|min:6|unique:students,phone,password',

        ];
    }
}
