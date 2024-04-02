<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class QuranEpisodesReques extends FormRequest
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
            'name'=>'required|string',
            'teacher_id'=>'required|integer',
            'period'=>'required|digits:1',
            'gender_id'=>'required|digits:1',
            'system_episoded_id'=>'required|integer',
        ];
    }
}
