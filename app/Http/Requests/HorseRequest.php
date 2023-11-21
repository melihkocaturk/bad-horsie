<?php

namespace App\Http\Requests;

use App\Models\Horse;
use Illuminate\Foundation\Http\FormRequest;

class HorseRequest extends FormRequest
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
            'description' => ['string', 'max:191'],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'gender' => ['required', 'string', 'max:191', 'in:' . implode(',', array_keys(Horse::$gender))],
            'race' => ['string', 'max:191'],
            'color' => ['string', 'max:191'],
            'height' => ['integer', 'max:255'],
            'fei_id' => ['string', 'max:191'],
        ];
    }
}
