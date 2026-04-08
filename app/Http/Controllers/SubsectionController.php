<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Formation;
use App\Models\Subsection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class SubsectionController extends Controller
{
	public function store(Request $request, Formation $formation, Chapter $chapter): RedirectResponse
	{
		$route = to_route('formations.chapters.config', [
			'formation' => $formation,
			'tab' => $chapter->id,
		]);

		if ((string)$chapter->formation_id !== (string)$formation->id) {
			return $route->with('error', 'Ce chapitre ne correspond pas a cette formation.');
		}

		if (auth()->id() !== $formation->user_id) {
			return $route->with('error', 'Vous n\'etes pas autorise a ajouter une sous-section.');
		}

		$validated = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'content' => ['nullable', 'string'],
		]);

		$nextOrderNumber = (int)($chapter->subsections()->max('order_number') ?? -1) + 1;

		$chapter->subsections()->create([
			...$validated,
			'order_number' => $nextOrderNumber,
		]);

		return $route->with('success', 'Sous-section creee avec succes.');
	}

	public function update(Request $request, Formation $formation, Chapter $chapter, Subsection $subsection): RedirectResponse
	{
		$route = to_route('formations.chapters.config', [
			'formation' => $formation,
			'tab' => $chapter->id,
		]);

		if ((string)$chapter->formation_id !== (string)$formation->id || (string)$subsection->chapter_id !== (string)$chapter->id) {
			return $route->with('error', 'Sous-section invalide pour ce chapitre.');
		}

		if (auth()->id() !== $formation->user_id) {
			return $route->with('error', 'Vous n\'etes pas autorise a modifier cette sous-section.');
		}

		$validated = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'content' => ['nullable', 'string'],
		]);

		$subsection->update($validated);

		return $route->with('success', 'Sous-section modifiee avec succes.');
	}

	/**
	 * Remove the specified resource from storage.
	 * @throws Throwable
	 */
	public function destroy(Formation $formation, Chapter $chapter, Subsection $subsection): RedirectResponse
	{
		$route = to_route('formations.chapters.config', [
			'formation' => $formation,
			'tab' => $chapter->id,
		]);

		if ((string)$chapter->formation_id !== (string)$formation->id || (string)$subsection->chapter_id !== (string)$chapter->id) {
			return $route->with('error', 'Sous-section invalide pour ce chapitre.');
		}

		if (auth()->id() !== $formation->user_id) {
			return $route->with('error', 'Vous n\'etes pas autorise a supprimer cette sous-section.');
		}

		DB::transaction(function () use ($chapter, $subsection) {
			$subsection->delete();

			$chapter->subsections()
				->orderBy('order_number')
				->orderBy('created_at')
				->orderBy('id')
				->get()
				->values()
				->each(function (Subsection $remainingSubsection, int $index) {
					$remainingSubsection->update(['order_number' => $index]);
				});
		});

		return $route->with('success', 'Sous-section supprimee avec succes.');
	}

	/**
	 * @throws Throwable
	 */
	public function sort(Request $request, Formation $formation, Chapter $chapter): RedirectResponse
	{
		$route = to_route('formations.chapters.config', $formation);

		if ((string)$chapter->formation_id !== (string)$formation->id) {
			return $route->with('error', 'Ce chapitre ne correspond pas a cette formation.');
		}

		if (auth()->id() !== $formation->user_id) {
			return $route->with('error', 'Vous n\'etes pas autorise a reordonner les sous-sections.');
		}

		$validated = $request->validate([
			'subsections_order' => ['required', 'json'],
		]);

		$order = json_decode($validated['subsections_order'], true);
		if (!is_array($order)) {
			return $route->with('error', 'L ordre des sous-sections est invalide.');
		}

		DB::transaction(function () use ($chapter, $order) {
			foreach ($order as $item) {
				if (!is_array($item) || !isset($item['id'], $item['position'])) {
					continue;
				}

				Subsection::query()
					->where('chapter_id', $chapter->id)
					->where('id', $item['id'])
					->update(['order_number' => (int)$item['position']]);
			}
		});

		return $route->with('success', 'Ordre des sous-sections enregistre avec succes.');
	}
}
