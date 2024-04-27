<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser tous les utilisateurs à accéder à cette route
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'CIN' => 'nullable|string|max:255',
            'Adresse' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'VersoIdentite' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'RectoIdentite' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
