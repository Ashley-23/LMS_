@extends('base', ['title' => 'Ajouter une formation'])

@section('content')
<div class="pd-20 card-box mb-30">
    @include('questions._form', ['route' => route('questions.store')])
</div>
@endsection
