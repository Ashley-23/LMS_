@extends('base', ['title' => 'Détails de la formation'], [
	'pageName' => 'Détails d\'une formation',
	'breadcrumbs' => [
		[
			'name' => 'Formations',
			'url' => route('formations.index')
		],
		[
			'name' => $formation->name,
		]
	]
])
@php
	$isActive = fn($tab) => request()->get('tab', 'infos-tab') === $tab ? 'active' : '';
@endphp

@section('content')
	<div class="pd-20 card-box mb-30">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link {{ $isActive('infos-tab') }}" id="infos-tab" data-toggle="tab" href="#formation-infos"
						   role="tab"
						   aria-controls="formation-infos"
						   aria-selected="true">
							Informations de formation
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ $isActive('chapters-tab') }}" id="chapters-tab" data-toggle="tab" href="#chapitres"
						   role="tab"
						   aria-controls="chapitres" aria-selected="false">
							Chapitres ( {{ $formation->chapters->count() }} )
						</a>
					</li>
					{{-- <li class="nav-item">
						<a class="nav-link {{ $isActive('learners-tab') }}" id="learners-tab" data-toggle="tab" href="#apprenants"
						   role="tab"
						   aria-controls="apprenants" aria-selected="false">
							Apprenants ( {{ $formation->learners->count() }} )
						</a>
					</li> --}}
				</ul>
			</div>

			<div class="card-body">
				<div class="tab-content">
					@include('formations._details-tab')
					@include('formations._chapters-tab')
					{{-- @include('formations._learners-tab') --}}
				</div>
			</div>
		</div>
	</div>

	@include('partials.sort-elements._sort-style')
	@include('partials.sort-elements._sort-script', ['listId' => 'chapters-sortable-list', 'hiddenInputId' => 'chapters-order-hidden'])

	@include('chapters._create-modal')
	@include('partials._delete-form')
@endsection
