@extends('base', ['title' => 'Modifier un quizz'])

@section('content')
<div class="pd-20 card-box mb-30">
    @include('quizzes._form', ['route' => route('quizzes.update', $quizz), 'isUpdate' => true])
</div>
@endsection