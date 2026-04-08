@php use Illuminate\Support\Str; @endphp
@extends('base', ['title' => 'Configuration du chapitre'], [
	'breadcrumbs' => [
		[
			'name' => 'Formations',
			'url' => route('formations.index')
		],
		[
			'name' => $formation->name,
			'url' => route('formations.show', $formation)
		],
		[
			'name' => 'Chapitres',
			'url' => route('formations.show', $formation) . '?tab=chapters-tab'
		],
		[
			'name' => 'Configuration des chapitres',
		],
	]
])

@php
	$chapters = $formation->chapters;
	$activeChapterId = request()->get('tab', $chapters->first()?->id);
	$canManage = auth()->id() === $formation->user_id;
@endphp

@section('content')
	<div class="col-md-12 col-sm-12 mb-30">
		<div class="pd-20 card-box">
			<div class="tab">
				<div class="row clearfix">
					<div class="col-md-3 col-sm-12">
						<ul class="nav flex-column vtabs nav-tabs customtab" role="tablist">
							@forelse($chapters as $chapter)
								@php($isActive = $chapter->id === $activeChapterId)
								<li class="nav-item">
									<a
										class="nav-link {{ $isActive ? 'active' : '' }}"
										data-toggle="tab"
										href="#chapter-{{ $chapter->id }}"
										role="tab"
										aria-selected="{{ $isActive ? 'true' : 'false' }}"
									>
										Chapitre {{ $loop->index + 1 }}
									</a>
								</li>
							@empty
								<li class="nav-item">
									<span class="nav-link disabled">Aucun chapitre</span>
								</li>
							@endforelse
						</ul>
					</div>
					<div class="col-md-9 col-sm-12">
						<div class="tab-content">
							@forelse($chapters as $chapter)
								@php($isActive = $chapter->id === $activeChapterId)
								<div class="tab-pane fade {{ $isActive ? 'show active' : '' }}" id="chapter-{{ $chapter->id }}"
								     role="tabpanel">
									<div class="pd-20">
										<h4 class="mb-20 h4 text-blue">{{ $chapter->name }}</h4>

										@if($canManage)
											<div class="d-flex flex-wrap mb-3 justify-content-end">
												<button type="button" class="btn btn-outline-primary mr-2 mb-2" data-toggle="modal"
												        data-target="#subsection-create-modal"
												        data-subsection-create-action="{{ route('formations.chapters.subsections.store', ['formation' => $formation, 'chapter' => $chapter]) }}"
												        data-subsection-create-chapter-name="{{ $chapter->name }}">
													Ajouter une sous-section
												</button>

												@if($chapter->subsections->count() > 1)
													<form method="POST"
													      action="{{ route('formations.chapters.subsections.order', ['formation' => $formation, 'chapter' => $chapter]) }}"
													      class="mb-2 mr-2">
														@csrf
														<input type="hidden" id="subsections-order-hidden-{{ $chapter->id }}"
														       name="subsections_order">
														<button type="submit" class="btn btn-primary">Enregistrer l'ordre</button>
													</form>
												@endif
											</div>
										@endif

										@if($chapter->subsections->isNotEmpty())
											<ul id="subsections-sortable-list-{{ $chapter->id }}" class="sortable-list list-unstyled mb-0">
												@foreach($chapter->subsections as $subsection)
													<li class="sortable-item d-flex align-items-start justify-content-between"
													    draggable="{{ $canManage ? 'true' : 'false' }}" data-id="{{ $subsection->id }}">
														<div class="pr-3">
															<div>
																<span class="sortable-item-order mr-2 font-weight-bold"></span>
																<span>{{ $subsection->name }}</span>
															</div>
															@if($subsection->content)
																<p
																	class="mb-0 mt-1 text-muted">{{ Str::limit($subsection->content, 180) }}</p>
															@endif
														</div>

														<div class="d-flex flex-column align-items-end">
															<button type="button" class="btn btn-link p-0 mb-2" data-toggle="modal"
															        data-target="#subsection-content-modal"
															        data-subsection-name="{{ $subsection->name }}"
															        data-subsection-content="{{ $subsection->content ?? '' }}" draggable="false">
																<i class="icon-copy ion-arrow-resize"></i>
															</button>

															@if($canManage)
																<a class="btn btn-link text-danger p-0" href="javascript:void(0);" draggable="false"
																   onclick='event.preventDefault(); showDeleteModal("{{ route('formations.chapters.subsections.destroy', ['formation' => $formation, 'chapter' => $chapter, 'subsection' => $subsection]) }}", "Etes-vous sur de vouloir supprimer la sous-section: {{ $subsection->name }} ?");'>
																	<i class="icon-copy ion-trash-a"></i>
																</a>
															@endif
														</div>
													</li>
												@endforeach
											</ul>
										@else
											<div class="alert alert-warning mb-0" role="alert">
												Aucune sous-section disponible pour ce chapitre.
											</div>
										@endif
									</div>
								</div>
							@empty
								<div class="tab-pane fade show active" role="tabpanel">
									<div class="pd-20">
										<div class="alert alert-warning mb-0" role="alert">
											Cette formation ne contient encore aucun chapitre.
										</div>
									</div>
								</div>
							@endforelse
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('partials.sort-elements._sort-style')
	@foreach($chapters as $chapter)
		@include('partials.sort-elements._sort-script', [
			'listId' => 'subsections-sortable-list-' . $chapter->id,
			'hiddenInputId' => 'subsections-order-hidden-' . $chapter->id,
		])
	@endforeach

	@if($canManage)
		@include('subsections._create-modal')
	@endif

	@include('subsections._show')

	@include('partials._delete-form')
@endsection

@section('_scripts')
	<script>
		(function () {
			const modal = $('#subsection-content-modal');
			if (!modal.length) {
				return;
			}

			const modalTitle = modal.find('[data-role="subsection-modal-title"]');
			const modalBody = modal.find('[data-role="subsection-modal-body"]');
			const emptyContentMessage = "Aucun contenu n'a encore ete ajoute a cette sous-section.";

			modal.on('show.bs.modal', function (event) {
				let triggerButton = event.relatedTarget;
				if (!triggerButton) {
					return;
				}

				let subsectionName = triggerButton.getAttribute('data-subsection-name') || 'Sous-section';
				let subsectionContent = triggerButton.getAttribute('data-subsection-content') || '';

				modalTitle.text(subsectionName);

				if (subsectionContent.trim()) {
					modalBody.html('<p class="mb-0 text-muted" style="white-space: pre-line;"></p>');
					modalBody.find('p').text(subsectionContent);
				} else {
					modalBody.html('<div class="alert alert-warning mb-0" role="alert">' + emptyContentMessage + '</div>');
				}
			});

			modal.on('hidden.bs.modal', function () {
				modalTitle.text('Sous-section');
				modalBody.empty();
			});
		})();

		(function () {
			const modal = $('#subsection-create-modal');
			if (!modal.length) {
				return;
			}

			const form = modal.find('[data-role="subsection-create-form"]');
			const title = modal.find('[data-role="subsection-create-title"]');
			const nameInput = modal.find('#subsection_name');
			const contentInput = modal.find('#subsection_content');
			const defaultTitle = 'Ajouter une sous-section';

			modal.on('show.bs.modal', function (event) {
				let triggerButton = event.relatedTarget;
				if (!triggerButton) {
					return;
				}

				let action = triggerButton.getAttribute('data-subsection-create-action') || '#';
				let chapterName = triggerButton.getAttribute('data-subsection-create-chapter-name') || '';

				form.attr('action', action);
				title.text(chapterName ? defaultTitle + ' - ' + chapterName : defaultTitle);
			});

			modal.on('hidden.bs.modal', function () {
				form.attr('action', '#');
				title.text(defaultTitle);
				nameInput.val('');
				contentInput.val('');
			});
		})();
	</script>
@endsection

