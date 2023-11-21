<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
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
            'description' => ['string', 'nullable'],
            'logo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'banner' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'address' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'email' => ['string', 'nullable', 'max:191'],
            'web' => ['string', 'nullable', 'max:191'],
            'coordinates' => ['string', 'nullable', 'max:191'],
            'tags' => ['nullable'],
            'tbf_link' => ['string', 'nullable', 'max:191'],
        ];
    }
}
