@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Team Registration Details</h2>
		<div class="row">
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-3">Tournament Name:</div>
					<div class="col-sm-6">{{$tournament->name}}</div>
				</div>
				<div class="row">
					<div class="col-sm-3">Subcategory:</div>
					<div class="col-sm-9">{{ $subcat_id }}</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="row">
					<div class="col-sm-12 text-right">
						<a href="/host" class="btn btn-outline-primary">Return to Dashbaord</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			@if(count($teams) == 0)
				<div class="col-sm-12 text-center mt-4 pt-4">
					Subcategory has no registered teams.
				</div>
			@else
				@foreach($teams as $team)
					<div class="col-sm-6">
						<div class="card my-2">
							<div class="card-header">
								Team Name: {{$team->team_name}}
							</div>
							<div class="card-body">
								<p class="card-text">
									Organization: {{$team->user->organization}}	
								</p>
								<p class="card-text">
									Coach Name: {{$team->coach_name}}
								</p>
								<p class="card-text">
									Coach Number: {{$team->mobile_number}}	
								</p>
								<div class="row mb-3" style="padding-left: 10px;">
									<div class="col-sm-6">Player Names</div>
									<div class="col-sm-6">Date of Birth</div>
								</div>
								@foreach($team->players as $player)
									<div class="row" style="padding-left: 10px;">
										<div class="col-sm-6">
											{{$player->name}}
										</div>
										<div class="col-sm-6">
											{{$player->date_of_birth}}
										</div>
									</div>
								@endforeach

							</div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection