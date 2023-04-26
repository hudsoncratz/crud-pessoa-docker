<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'cpf' => ['nullable', 'string','unique:people'],
            'birthdate' => ['required'],
            'email' => ['required', 'string','unique:people'],
            'phone' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'location' => ['required', 'string'],
        ];
    }
}
