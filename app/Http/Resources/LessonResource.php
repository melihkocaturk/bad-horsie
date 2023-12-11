<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'club_id' => $this->club_id,
            'name' => $this->name,
            'start' => $this->start,
            'end' => $this->end,
            'trainer' => new MemberResource($this->trainer),
            'student' => new MemberResource($this->student),
            'trainer_confirmation' => $this->trainer_confirmation,
            'student_confirmation' => $this->student_confirmation,
            'reason_for_reject' => $this->reason_for_reject,
            'horse' => new HorseResource($this->horse),
            'grade' => $this->grade,
            'comment' => $this->comment,
        ];
    }
}
