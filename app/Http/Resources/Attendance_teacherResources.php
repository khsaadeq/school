<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Attendance_teacherResources extends JsonResource
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
        'teacher_id'=>$this->teacher->name,
        'id_atendances'=>$this->atendance->name,
        'day_date'=>$this->day_date,

    ];
    }
}
