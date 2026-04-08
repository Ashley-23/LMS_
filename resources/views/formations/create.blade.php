@extends('base', ['title' => 'Ajouter une formation', 'breadcrumbs' => [
	[
		'name' => 'Formations',
		'url' => route('formations.index')
	],
	[
		'name' => 'Nouvelle formation',
	]
]])

@section('content')
<div class="pd-20 card-box mb-30">
    @include('formations._form', ['route' => route('formations.store')])
</div>
@endsection
