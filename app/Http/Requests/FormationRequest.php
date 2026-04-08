<?php

namespace App\Http\Requests;

use App\Enums\FormationLevelEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormationRequest extends FormRequest
{
	public function authorize(): bool
	{
        // return ($param = $this->route()->parameter('formation'))? $param->user_id === auth()->id() : true;
		return !($param = $this->route()->parameter('formation')) || $param->user_id === auth()->id();
	}

	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255'],
			'description' => ['required', 'string', 'max:2000'],
			'level' => ['required', Rule::enum(FormationLevelEnum::class)],
			'duration' => ['required', 'integer', 'min:1'],
		];
	}

	public function attributes(): array
	{
		return [
			'name' => 'Le nom',
			'description' => 'La description',
			'level' => 'Le niveau',
			'duration' => 'La durée',
		];
	}

	protected function failedAuthorization(): void
	{
		abort(403, 'Action non autorisée.');
	}
}
