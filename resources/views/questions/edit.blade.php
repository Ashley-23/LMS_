@extends('base', ['title' => 'Modifier une question'])

@section('content')
<div class="pd-20 card-box mb-30">
    @include('questions._form', ['route' => route('questions.update', $question), 'isUpdate' => true])
</div>
@endsection
