<div class="modal fade" id="subsection-create-modal" tabindex="-1" role="dialog"
     aria-labelledby="subsection-create-modal-label" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" action="#" data-role="subsection-create-form">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="subsection-create-modal-label" data-role="subsection-create-title">
						Ajouter une sous-section
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="font-weight-bold" for="subsection_name">Nom</label>
						<input id="subsection_name" name="name" type="text" class="form-control" maxlength="255" required>
					</div>
					<div class="form-group mb-0">
						<label class="font-weight-bold" for="subsection_content">Contenu</label>
						<textarea id="subsection_content" name="content" class="form-control" rows="5"
						          placeholder="Contenu de la sous-section"></textarea>
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
