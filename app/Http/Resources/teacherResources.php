<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ' id'=>$this->id,
            'name'=>$this->name,
            // 'work'=>$this->work,
            'salary'=>$this->salary,
            'teaching_years'=>$this->teaching_years,
            'center_they_work'=>$this->center_they_work,
            'address'=>$this->address,
            'identity_id'=>$this->identity->type_identity,
            'number_identity'=>$this->number_identity,
            'nationality_id'=>$this->nationality->name,
            'birth_date'=>$this->birth_date,
            'qualification_study_id'=>$this->qualification_study->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'password'=>$this->password,
            'job_id'=>$this->job->name,
    ];
    }
}
