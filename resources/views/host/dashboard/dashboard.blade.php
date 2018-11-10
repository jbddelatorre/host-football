@extends('layouts.app')

@section('content')

	<div class="container">
		@include('host.dashboard.registerTournament')
		@include('host.dashboard.showRegisteredTournaments')
		@include('host.dashboard.showOngoingTournaments')
		@include('host.dashboard.showTournamentsHistory')
	</div>
@endsection

