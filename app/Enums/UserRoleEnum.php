<?php

namespace App\Enums;

use App\Traits\EnumToolsTrait;

enum UserRoleEnum:string
{
    use EnumToolsTrait;
    case ADMIN = 'admin';
    case TRAINER = 'trainer';
    case LEARNER = 'learner';
}
