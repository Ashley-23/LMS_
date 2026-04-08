<?php

namespace App\Enums;

use App\Traits\EnumToolsTrait;
use function Laravel\Prompts\select;

enum FormationLevelEnum: string
{
	use EnumToolsTrait;

	case BEGINNER = 'beginner';
	case INTERMEDIATE = 'intermediate';
	case ADVANCED = 'advanced';

	public function displayName(): string
	{
		return match ($this) {
			self::BEGINNER => 'Débutant',
			self::INTERMEDIATE => 'Intermédiaire',
			self::ADVANCED => 'Avancé',
		};
	}

	public function displayColor(): string
	{
		return match ($this) {
			self::BEGINNER => 'info',
			self::INTERMEDIATE => 'success',
			self::ADVANCED => 'warning',
		};
	}
}
