<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@php($appName = config('app.name'))
	<title>{{$title ? $title . " | $appName" : $appName }}</title>
	@include('partials._styles')
</head>
<body>
{{-- @include('partials._preloader') --}}
@include('partials._header')
@include('partials._right-sidebar')
@include('partials._left-sidebar')

<div class="mobile-menu-overlay"></div>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>{{ $pageName ?? $title ?? 'Blank' }}</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								@forelse($breadcrumbs ?? [] as $breadcrumb)
									<li class="breadcrumb-item active {{ $loop->last ? 'active' : '' }}" aria-current="page">
										@unless($loop->last) <a
											href="{{ $breadcrumb['url'] ?? 'javascript:void(0);' }}">@endunless{{ $breadcrumb['name'] }}</a>
									</li>
								@empty
									<li class="breadcrumb-item active" aria-current="page">blank</li>
								@endforelse
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						@include('partials._flash-message')
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				@yield('content')
			</div>
		</div>
		<div class="footer-wrap pd-20 mb-20 card-box">
			{{$appName}} - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
				Hingarajiya</a>
		</div>
	</div>
</div>
@include('partials._scripts')
</body>
</html>


