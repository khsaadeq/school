<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuranEpsisadesResources extends JsonResource
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
                    'teacher_id'=>$this->teacher->name,
                    'period'=>$this->period,
                    'gender_id'=>$this->gender->name,
                    'system_episoded_id'=>$this->system_episoded->name,

    ];
    }
}
