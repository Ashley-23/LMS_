<div class="tab-pane fade {{ $isActive('infos-tab') ? 'show active' : '' }}" id="formation-infos" role="tabpanel"
     aria-labelledby="infos-tab">
	<div class="row">
		<div class="col-md-6 col-sm-12 mb-4">
			<label class="font-weight-bold">Nom</label>
			<input class="form-control" type="text" value="{{ $formation->name }}" readonly>
		</div>

		<div class="col-md-6 col-sm-12 mb-4">
			<label class="font-weight-bold">Durée (Heure)</label>
			<input class="form-control" type="text" value="{{ $formation->duration }}" readonly>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-sm-12 mb-4">
			<label class="font-weight-bold">Niveau</label>
			<input class="form-control" type="text" value="{{ $formation->level->displayName() }}" readonly>
		</div>

		<div class="col-md-6 col-sm-12 mb-4">
			<label class="font-weight-bold">Créé par</label>
			<input class="form-control" type="text" value="{{ $formation->user?->name ?? 'N/A' }}" readonly>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<label class="font-weight-bold">Description</label>
			<textarea class="form-control" rows="4"
			          readonly>{{ $formation->description ?: 'Aucune description.' }}</textarea>
		</div>
	</div>

	@if(auth()->id() === $formation->user_id)
		<div class="row mt-4">
			<div class="col-12">
				<a href="{{ route('formations.edit', $formation) }}" class="btn btn-primary mr-2">Modifier</a>
				<a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour à la liste</a>
			</div>
		</div>
	@endif
</div>
