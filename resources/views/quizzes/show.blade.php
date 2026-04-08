@extends('base', ['title' => 'Détails du quizz'])

@section('content')

    <div class="pd-20 card-box mb-30">
        <h4 class="mb-20">{{ $quizz->nom }}</h4>
        <p><strong>Subsection:</strong> {{ $quizz->subsection?->name ?? 'N/A' }}</p>
        <p><strong>Questions:</strong> {{ $quizz->questions->count() }}</p>

        <div class="mt-3">
            <h5>Questions</h5>
            <ul>
                @forelse($quizz->questions as $question)
                    <li>
                        {{ $question->content }}
                        <ul>
                            @foreach($question->answers as $answer)
                                <li @if($question->answer_id === $answer->id) class="font-weight-bold" @endif>
                                    {{ $answer->content }}
                                    @if($question->answer_id === $answer->id)
                                        (correct)
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @empty
                    <li>Aucune question</li>
                @endforelse
            </ul>
        </div>

        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>

@endsection