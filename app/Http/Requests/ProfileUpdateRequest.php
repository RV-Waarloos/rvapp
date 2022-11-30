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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['string', 'required', 'max:255'],
            'lastname' => ['string', 'required', 'max:255'],
            'email' => ['email', 'required', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'city' => ['string', 'nullable', 'max:255'],
            'streetandnumber' => ['string', 'nullable', 'max:255'],
            'zipcode' => ['integer', 'nullable', 'max:9999', 'min:1000'],
            'birthdate' => ['date', 'nullable'],
            'phone' => ['string', 'nullable','max:255'],

        ];
    }
}
