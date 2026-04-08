@extends('base', ['title' => 'Ajouter un quizz'])

@section('content')
<div class="pd-20 card-box mb-30">
    @include('quizzes._form', ['route' => route('quizzes.store')])
</div>
@endsection