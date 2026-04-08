<div class="tab-pane fade {{ $isActive('chapters-tab') ? 'show active' : '' }}" id="chapitres" role="tabpanel"
     aria-labelledby="chapters-tab">
	@if(auth()->id() === $formation->user_id)
		<div class="d-flex flex-wrap mb-3 justify-content-end">
			<button type="button" class="btn btn-outline-primary mr-2 mb-2" data-toggle="modal"
			        data-target="#chapterModal">
				Ajouter un chapitre
			</button>

			@if($formation->chapters->count() > 1)
				<form method="POST" action="{{ route('formations.chapters.order', ['formation' => $formation]) }}"
				      class="mb-2 mr-2">
					@csrf
					<input type="hidden" id="chapters-order-hidden" name="chapters_order">
					<button type="submit" class="btn btn-primary">Enregistrer l'ordre</button>
				</form>
			@endif
			<a href="{{ route('formations.chapters.config', $formation) }}" class="btn btn-secondary mb-2">Configurer les chapitres</a>
		</div>
	@endif

	@if($formation->chapters->isNotEmpty())
		<ul id="chapters-sortable-list" class="sortable-list list-unstyled mb-0">
			@foreach($formation->chapters as $chapter)
				<li class="sortable-item d-flex align-items-center justify-content-between"
				    draggable="{{ auth()->id() === $formation->user_id ? 'true' : 'false' }}"
				    data-id="{{ $chapter->id }}">
					<div>
						<span class="sortable-item-order mr-2 font-weight-bold"></span>
						<span>{{ $chapter->name }}</span>
					</div>
					<a class="btn btn-link text-danger p-0" href="javascript:void(0);" draggable="false"
					   onclick='
										    event.preventDefault();
												showDeleteModal(
													"{{ route('formations.chapters.destroy', ['formation' => $formation, 'chapter' => $chapter]) }}",
													"Êtes-vous sûr de vouloir supprimer le chapitre: {{ $chapter->name  }} ?"
													);
												'>
						<i class="dw dw-delete-3"></i> Supprimer
					</a>
				</li>
			@endforeach
		</ul>
	@else
		<div class="alert alert-warning" role="alert">
			Aucun chapitre disponible pour cette formation.
		</div>
	@endif
</div>
