<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id'=>$this->id,
        'name'=>$this->name,
        'gender_id'=>$this->gender->name,
        // 'gender_id'=>$this->gender_id,
        // 'gender_id'=>$this->gender_id,
        'job'=>$this->job,
        'social_status'=>$this->social_status,
        'email'=>$this->email,
        'phone'=>$this->phone,

    ];
    }
}
