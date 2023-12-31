<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:5', 'max:191'],
            'email' => ['email', 'max:191', Rule::unique(User::class)->ignore($this->user()->id)],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'tbf_link' => ['string', 'nullable', 'max:191'],
        ];
    }
}
