<?php

namespace App\Http\Controllers;

use App\Enums\FormationLevelEnum;
use App\Http\Requests\FormationRequest;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
	public function index()
	{
		$formations = Formation::with('user')->latest('name')->get();
		return view('formations.index', compact('formations'));
	}

	public function create()
	{
		return view('formations.create', [
			'formation' => new Formation(),
			'levels' => FormationLevelEnum::cases(),
		]);
	}

	public function store(FormationRequest $request)
	{
		Formation::create([
			...$request->validated(),
			'level' => $request->enum('level', FormationLevelEnum::class),
			'user_id' => auth()->id(),
		]);

		return to_route('formations.index')->with('success', 'Formation créée avec succès.');
	}

	public function show(Formation $formation)
	{
		$formation->load([
			'user',
			'chapters' => fn ($query) => $query->orderBy('name'),
		]);

		// $learners = User::with('user')->latest('name')->get();

		return view('formations.show', compact('formation'));
	}

	public function edit(Formation $formation)
	{
		return view('formations.edit', [
			'formation' => $formation,
			'levels' => FormationLevelEnum::cases(),
		]);
	}

	public function update(FormationRequest $request, Formation $formation)
	{
		$formation->update([
			...$request->validated(),
		]);

		return to_route('formations.index')->with('success', 'Formation créée avec succès.');
	}

	public function destroy(Formation $formation)
	{
		try {
			DB::beginTransaction();
			$formation->chapters()->delete();
			$formation->delete();
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			return to_route('formations.index')->with('error', 'Une erreur est survenue lors de la suppression de la formation.');
		}
		return to_route('formations.index')->with('success', 'Formation supprimée avec succès.');
	}
}
