<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'trainer_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
        ];
    }
}
