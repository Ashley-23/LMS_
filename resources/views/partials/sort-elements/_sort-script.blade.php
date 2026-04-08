<script>
	(function () {
		const list = document.getElementById('{{ $listId }}');
		const hidden = document.getElementById('{{ $hiddenInputId }}');
		let draggedItem = null;

		if (!list) {
			return;
		}

		function refreshChapterPositions() {
			Array.from(list.querySelectorAll('.sortable-item')).forEach(function (item, index) {
				const indexTarget = item.querySelector('.sortable-item-order');
				if (indexTarget) {
					indexTarget.textContent = (index + 1) + ' -';
				}
			});
		}

		function refreshChapterOrderPayload() {
			if (!hidden) {
				return;
			}

			const order = Array.from(list.querySelectorAll('.sortable-item')).map(function (item, index) {
				return {
					position: index + 1,
					id: item.dataset.id
				};
			});
			hidden.value = JSON.stringify(order);
		}

		list.addEventListener('dragstart', function (event) {
			const target = event.target.closest('.sortable-item');
			if (!target) {
				return;
			}

			draggedItem = target;
			target.classList.add('is-dragging');
			event.dataTransfer.effectAllowed = 'move';
			event.dataTransfer.setData('text/plain', target.dataset.id || '');
		});

		list.addEventListener('dragover', function (event) {
			event.preventDefault();
			const target = event.target.closest('.sortable-item');
			if (!draggedItem || !target || draggedItem === target) {
				return;
			}

			Array.from(list.querySelectorAll('.sortable-item')).forEach(function (item) {
				item.classList.remove('drop-target');
			});
			target.classList.add('drop-target');

			const rect = target.getBoundingClientRect();
			const shouldInsertAfter = (event.clientY - rect.top) > (rect.height / 2);
			if (shouldInsertAfter) {
				target.after(draggedItem);
			} else {
				target.before(draggedItem);
			}

			refreshChapterPositions();
			refreshChapterOrderPayload();
		});

		list.addEventListener('drop', function (event) {
			event.preventDefault();
			refreshChapterPositions();
			refreshChapterOrderPayload();
		});

		list.addEventListener('dragend', function () {
			Array.from(list.querySelectorAll('.sortable-item')).forEach(function (item) {
				item.classList.remove('is-dragging', 'drop-target');
			});
			draggedItem = null;
			refreshChapterPositions();
			refreshChapterOrderPayload();
		});

		refreshChapterPositions();
		refreshChapterOrderPayload();
	})();
</script>
