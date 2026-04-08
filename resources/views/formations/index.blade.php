@extends('base', ['title' => 'Liste des formations'], [
	 'breadcrumbs' => [
		 [
		 'name' => 'Formations',
		 'url' => route('formations.index')
		 ],
		 [
     'name' => 'Liste',
		]
	 ]
])

@section('content')

	<div class="card-box mb-30">
		<div class="pb-20 pt-3">
			<table class="data-table table stripe hover nowrap">
				<thead>
				<tr>
					<th class="table-plus datatable-nosort">Nom</th>
					<th>Nb d'inscrits</th>
					<th>Niveau</th>
					<th>Durée</th>
					<th>Créé par</th>
					<th class="datatable-nosort">Action</th>
				</tr>
				</thead>
				<tbody>
				@forelse($formations as $formation)
					@php($isMine = $formation->user_id === auth()->id())
					<tr>
						<td class="table-plus">{{ $formation->name->limit(30) }}</td>
						<td>{{ 0 }} <i class="icon-copy ion-person-stalker"></i></td>
						<td class="text-{{$formation->level->displayColor()}}">{{ $formation->level->displayName() }}</td>
						<td>{{ $formation->duration }} {{ Str::plural('heure', $formation->duration) }}</td>
						<td class="{{ $isMine ? 'text-primary' : '' }}">
							@if($isMine)
								<i class="icon-copy ion-person"></i> Moi
							@else
								{{ $formation->user?->name ?? 'N/A' }}
							@endif
						</td>
						<td>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button"
								   data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="{{ route('formations.show', $formation) }}"><i class="dw dw-eye"></i>
										Voir</a>
									@if($isMine)
										<a class="dropdown-item" href="{{ route('formations.edit', $formation) }}"><i
												class="dw dw-edit2"></i>
											Modifier</a>
										<a class="dropdown-item" href="javascript:void(0);"
										   onclick="event.preventDefault(); showDeleteModal('{{ route('formations.destroy', $formation) }}');"><i
												class="dw dw-delete-3"></i> Supprimer</a>
									@endif
								</div>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="6">Aucune formation disponible.</td>
					</tr>
				@endforelse
				</tbody>
			</table>
		</div>
	</div>
	@include('partials._delete-form')
@endsection
