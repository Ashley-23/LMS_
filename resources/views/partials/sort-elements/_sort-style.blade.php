<style>
	.sortable-list {
		display: grid;
		gap: 10px;
	}

	.sortable-item {
		cursor: move;
		padding: 12px 14px;
		border: 1px solid #d7d7d7;
		border-radius: 6px;
		background: #ffffff;
		transition: background-color .15s ease, border-color .15s ease;
	}

	.sortable-item.is-dragging {
		opacity: .45;
		background: #f5f7fb;
	}

	.sortable-item.drop-target {
		border-color: #3b82f6;
		background: #eef5ff;
	}
</style>
