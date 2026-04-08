<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
{

	public function authorize(): bool
	{
		return auth()->id() === $this->route('formation')->user_id;
	}

	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255']
		];
	}

	public function attributes(): array
	{
		return [
			'name' => 'Le nom du chapitre',
		];
	}
}
