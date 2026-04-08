<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizzRequest;
use App\Models\Quizz;
use App\Models\Subsection;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function index()
    {
        $quizzes = Quizz::with(['subsection', 'questions.answers'])->latest('name')->get();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $subsections = Subsection::all();
        return view('quizzes.create', compact('subsections'));
    }

    public function store(QuizzRequest $request)
    {       
         Quizz::create($request->validated());

        return redirect()->route('quizzes.index')->with('success', 'Quizz créé avec succès.');
    }

    public function show(Quizz $quizz)
    {
        $quizz->load(['subsection', 'questions.answers']);
        return view('quizzes.show', compact('quizz'));
    }

    public function edit(Quizz $quizz)
    {
        $subsections = Subsection::all();
        return view('quizzes.edit', compact('quizz', 'subsections'));
    }

    public function update(QuizzRequest $request, Quizz $quizz)
    {
        $quizz->update($request->validated());

        return redirect()->route('quizzes.index')->with('success', 'Quizz mis à jour avec succès.');
    }

    public function destroy(Quizz $quizz)
    {
        $quizz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quizz supprimé.');
    }
}
