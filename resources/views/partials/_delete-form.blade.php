<form id="delete-form" method="POST" hidden>
	@csrf
	@method('DELETE')
</form>

<script>
	function showDeleteModal(url, title = 'Êtes-vous sûr ?', text = "Vous ne pourrez pas annuler ceci !") {
		swal({
			title: title,
			text: text,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Oui, supprimer !'
		}).then((result) => {
			console.log(result);
			if (result.value) {
				let form = document.getElementById('delete-form');
				form.action = url;
				form.submit();
			}
		});
	}
</script>
