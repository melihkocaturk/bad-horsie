<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
            'logo' => asset('storage/' . $this->logo),
            'banner' => asset('storage/' . $this->banner),
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'web' => $this->web,
            'coordinates' => $this->coordinates,
            'tags' => TagResource::collection($this->tags),
            'tbf_link' => $this->tbf_link,
            'members' => MemberResource::collection($this->members),
            'horses' => HorseResource::collection($this->horses),
        ];
    }
}
