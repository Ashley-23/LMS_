<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class QuizzRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'subsection_id' => ['required', 'exists:subsections,id'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Le nom',
            'subsection_id' => 'La sous-section',
        ];
    }
}
