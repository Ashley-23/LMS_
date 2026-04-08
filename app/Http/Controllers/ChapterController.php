<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ChapterController extends Controller
{
    	public function store(ChapterRequest $request, Formation $formation)
	{
		$nextOrderNumber = (int) ($formation->chapters()->max('order_number') ?? -1) + 1;

		Chapter::create([
			...$request->validated(),
			'formation_id' => $request->route('formation')->id,
			'order_number' => $nextOrderNumber,
		]);

		return to_route('formations.show', [
			'formation' => $request->route('formation'),
			'tab' => 'chapters-tab',
		])->with('success', 'Chapitre créé avec succès.');
	}

	/**
	 * @throws Throwable
	 */
	public function sort(Request $request, Formation $formation): RedirectResponse
	{
		$route = to_route('formations.show', [
			'formation' => $formation,
			'tab' => 'chapters-tab',
		]);

		if (auth()->id() !== $formation->user_id) {
			return $route->with('error', 'Vous n\'êtes pas autorisé à réordonner ces chapitres.');
		}

		$validated = $request->validate([
			'chapters_order' => ['required', 'json'],
		]);

		$order = json_decode($validated['chapters_order'], true);

		if (! is_array($order)) {
			return $route->with('error', "L'ordre des chapitres est invalide.");
		}

		DB::transaction(function () use ($formation, $order) {
			foreach ($order as $item) {
				if (! is_array($item) || ! isset($item['id'], $item['position'])) {
					continue;
				}

				Chapter::query()
					->where('formation_id', $formation->id)
					->where('id', $item['id'])
					->update(['order_number' => (int) $item['position']]);
			}
		});

		return $route->with('success', 'Ordre des chapitres enregistré avec succès.');
	}

	public function configure(Formation $formation): View
	{
		$formation->load('chapters.subsections');
		return view('chapters.configure', compact('formation'));
	}

	/**
	 * @throws Throwable
	 */
	public function destroy(Formation $formation, Chapter $chapter): RedirectResponse
	{
		$route = to_route('formations.show', [
			'formation' => $formation,
			'tab' => 'chapters-tab',
		]);

		if ((string) $chapter->formation_id !== (string) $formation->id) {
			return $route->with('error', 'Ce chapitre ne correspond pas a cette formation.');
		}

		if (auth()->id() !== $formation->user_id) {
			return $route->with('error', 'Vous n\'êtes pas autorisé à supprimer ce chapitre.');
		}

		DB::transaction(function () use ($formation, $chapter) {
			$chapter->subsections()->delete();
			$chapter->delete();

			$formation->chapters()
				->orderBy('order_number')
				->orderBy('created_at')
				->orderBy('id')
				->get()
				->values()
				->each(function (Chapter $remainingChapter, int $index) {
					$remainingChapter->update(['order_number' => $index]);
				});
		});

		return $route->with('success', 'Chapitre supprimé avec succès.');
	}
}
