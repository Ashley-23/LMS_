@extends('base', ['title' => 'Modifier une formation', 'breadcrumbs' => [
	[
		'name' => 'Formations',
		'url' => route('formations.index')
	],
	[
		'name' => $formation->name,
		'url' => route('formations.show', $formation)
	],
	[
		'name' => 'Modifier',
	]
]])

@section('content')
	<div class="pd-20 card-box mb-30">
		@include('formations._form', ['route' => route('formations.update', $formation), 'isUpdate' => true])
</div>
@endsection
