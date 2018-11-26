@extends('layouts.app')

<style>
	.error-image {
		width: 100%;

	}
</style>

@section('content')
	<div class="container">
		<div class="row my-2">
			<div class="col-sm-12 text-center">
				<img class="error-image" src="{{asset('/img/error.png')}}" alt="404 Page not found">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-sm-12 text-center">
				<p>We could not find the page your are looking for.</p>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-sm-12 text-center">
				<a href="/">Return to site</a>
			</div>
		</div>
	</div>
@endsection