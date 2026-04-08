<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
			'name' => 'Test Trainer',
			'email' => 'trainer@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::TRAINER,
		]);

		User::query()->create([
			'name' => 'Test User',
			'email' => 'learner@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::LEARNER,
		]);

		User::query()->create([
			'name' => 'Sophie Martin',
			'email' => 'sophie.martin@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::TRAINER,
		]);

		User::query()->create([
			'name' => 'Karim Benali',
			'email' => 'karim.benali@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::TRAINER,
		]);

		User::query()->create([
			'name' => 'Nadia Laurent',
			'email' => 'nadia.laurent@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::LEARNER,
		]);

		User::query()->create([
			'name' => 'Mehdi Diallo',
			'email' => 'mehdi.diallo@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::LEARNER,
		]);

		User::query()->create([
			'name' => 'Camille Robert',
			'email' => 'camille.robert@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::LEARNER,
		]);

		User::query()->create([
			'name' => 'Julien Moreau',
			'email' => 'julien.moreau@test.dev',
			'password' => Hash::make('password'),
			'role' => UserRoleEnum::ADMIN,
		]);
    }
}
