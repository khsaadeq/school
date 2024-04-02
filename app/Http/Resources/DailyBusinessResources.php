<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyBusinessResources extends JsonResource
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
        'id_student'=>$this->teacher->student->name,
            'from_surah'=>$this->teacher->from_surah,
            'from_ayah'=>$this->teacher->from_ayah,
            'to_surah'=>$this->teacher->to_surah,
            'to_ayah'=>$this->teacher->to_ayah,
            'seve_or_ver'=>$this->teacher->seve_or_ver,
            'degree'=>$this->teacher->degree,
            'day_date'=>$this->teacher->day_date,
    ];
    }
}
