<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HorseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'avatar' => asset('storage/' . $this->avatar),
            'gender' => \App\Models\Horse::$gender[$this->gender],
            'race' => $this->race,
            'color' => $this->color,
            'height' => $this->height,
            'fei_id' => $this->fei_id,
        ];
    }
}
