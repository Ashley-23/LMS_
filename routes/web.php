<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\SubsectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('auth.login');
});

//Route::view('test', 'test', ['formations' => \App\Models\Formation::with('user')->withCount('chapters')->get()]);

Route::view('test2', 'test2', ['formations' => \App\Models\Formation::with('user')->withCount('chapters')->get()])->name('formations.lister');
// Route::get('/subchapters/{id}/quizzes', [QuizzController::class, 'quizzes']);

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
	Route::resource('formations', FormationController::class);
	Route::resource('questions', QuestionController::class);
	Route::resource('quizzes', QuizzController::class)->parameters(['quizzes' => 'quizz']);

	Route::name('formations.chapters.')->prefix('formations/{formation}/chapitres')->group(function () {
		Route::controller(ChapterController::class)->group(function () {
			Route::post('ajouter', 'store')->name('store');
			Route::post('ordonner', 'sort')->name('order');
			Route::get('configurer', 'configure')->name('config');
			Route::delete('{chapter}/supprimer', 'destroy')->name('destroy');
		});

		Route::prefix('{chapter}')->group(function () {
			Route::post('subsections/ordonner', [SubsectionController::class, 'sort'])->name('subsections.order');
			Route::resource('subsections', SubsectionController::class)
				->only(['store', 'update', 'destroy'])
				->parameters(['subsections' => 'subsection']);
		});
	});
});

require __DIR__ . '/auth.php';
