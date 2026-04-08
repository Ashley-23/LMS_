<div class="modal fade" id="chapterModal" tabindex="-1" role="dialog" aria-labelledby="chapterModalLabel"
     aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" action="{{ route('formations.chapters.store', ['formation' => $formation]) }}">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="chapterModalLabel">Ajouter un chapitre</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group mb-0">
						<label class="font-weight-bold" for="chapter_name">Nom du chapitre</label>
						<input
							id="chapter_name"
							name="name"
							type="text"
							class="form-control @error('name') is-invalid @enderror"
							maxlength="255"
							required
							value="{{ old('name') }}"
						>
						@error('name')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					<button type="submit" class="btn btn-primary">Enregistrer</button>
				</div>
			</form>
		</div>
	</div>
</div>
