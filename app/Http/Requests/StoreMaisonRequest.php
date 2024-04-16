<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaisonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules():array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|integer',
            'type_id' => 'required|exists:property_types,id',
            'city_id' => 'required|exists:cities,id',
            'adresse' => 'required',
            'date_construction' => 'nullable|date',
            'surface' => 'nullable|integer',
            'number_rooms' => 'nullable|integer',
            'number_sallon' => 'nullable|integer',
            'number_salleBain' => 'nullable|integer',
            'balcon' => 'nullable|string',
            'terrasse' => 'nullable|string',
            'piscine' => 'nullable|string',
            'jardin' => 'nullable|string',
            'parking' => 'nullable|string',
            'RezDeChaussé' => 'nullable|string',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ];

    }
}
