<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DailyBusinessRequest extends FormRequest
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
            'id_student'=>'required|integer',
            'from_surah'=>'required|string|max:40',
            'from_ayah'=>'required|digits_between:1,3',
            'to_surah'=>'required|string|max:40',
            'to_ayah'=>'required|digits_between:1,3',
            'seve_or_ver'=>'required|string|max:20',
            'degree'=>'required| digits_between:1,3',
            'day_date'=>'required|date_format:Y-m-d',
        ];
    }
}
