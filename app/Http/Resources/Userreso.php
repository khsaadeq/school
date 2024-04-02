<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Userreso extends JsonResource
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
        'hhmn'=>$this->name,
        'jfjf'=>$this->email,
        'tdtdg'=>$this->type_user_id,
    ];
    }
}
