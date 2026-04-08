@extends('base', ['title' => 'Test de la page'])

@section('content')
	<div class="min-height-200px">
		<h4 class="h4 text-blue mb-30">Card columns</h4>
		<div class="card-columns mb-30">
			@foreach($formations as $formation)
				<div class="card card-box">
					<img class="card-img-top" src="https://placehold.co/600x400@2x.png?text={{$formation->name}}"
					     alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"> <a href="{{ route('formations.show', $formation) }}" target="_blank"> {{$formation->name}} </a></h5>
						<p class="card-text">{{$formation->description}}</p>
						<p class="card-text d-flex flex-column mb-0">
							<span class="mb-1">
								<i class="icon-copy ion-clock mr-1" aria-hidden="true"></i>
								{{$formation->duration}} {{ Str::plural('heure', $formation->duration) }}
							</span>
							<span class="mb-1">
								<i class="icon-copy ion-arrow-graph-up-right"></i>
								{{ $formation->level->displayName() }}
							</span>
						</p>
						<div class="mt-3 pt-2 border-top text-muted d-flex flex-column">
							<span class="mb-1">
								<i class="icon-copy ion-clock mr-1" aria-hidden="true"></i>
								Publié le {{$formation->created_at->format('d m Y')}}
							</span>
							<span class="mb-1">
								<i class="icon-copy ion-person mr-1" aria-hidden="true"></i>
								{{ $formation->user?->name ?? 'N/A' }}
							</span>
							<span>
								<i class="icon-copy ion-ios-albums-outline mr-1" aria-hidden="true"></i>
								{{ $formation->chapters_count }} {{ Str::plural('chapitre', $formation->chapters_count) }}
							</span>
						</div>
					</div>
				</div>

			@endforeach
		</div>
	</div>
@endsection

{{-- {{ route('formations.show', $formation) }} --}}

