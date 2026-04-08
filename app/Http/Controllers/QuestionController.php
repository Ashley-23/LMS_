<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Quizz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with(['quizz','answer'])->latest('content')->get();
        return view('questions.index', compact('questions'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $quizzes = Quizz::all();
        // $quizzes = Quizz::orderBy('content')->get();

        $quizzes = Quizz::where('user_id', auth()->id())
                    ->orderBy('quizzes.name')
                    ->get();

        return view('questions.create', [
            'question' => new Question(),
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    public function destroy(Question $question)
    {
        try {
            $question->answers()->delete();
            $question->delete();
        } catch (\Exception $e) {
            return redirect()->route('questions.index')->with('error', 'Impossible de supprimer la question. Veuillez réessayer plus tard.');
        }

        return redirect()->route('questions.index')->with('success', 'Question supprimée.');
    }
}
