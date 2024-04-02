<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class studentResources extends JsonResource
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
            'address'=>$this->address,
            'school'=>$this->school,
            'identity_id'=>$this->identity->type_identity,
            'number_identity'=>$this->number_identity,
            // 'gender_id'=>$this->gender->name,
            'nationality_id'=>$this->nationality->name,
            'guardian_id'=>$this->Paran->name,
            'link_kinship'=>$this->link_kinship,
            'previous_save'=>$this->previous_save,
            'date_Join'=>$this->date_Join,
            'quran_episod_id'=>$this->quran_episod->name,
            'image'=>$this->image,
            'job_date'=>$this->job_date,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'password'=>$this->password,
        // 'id'=>$this->id,
        // 'name'=>$this->name,
        // 'gender_id'=>$this->gender->name,
        // 'job'=>$this->job,
        // 'social_status'=>$this->social_status,
        // 'email'=>$this->email,
        // 'phone'=>$this->phone,

    ];
    }
}
