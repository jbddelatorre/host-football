@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Tournament Name: {{$tournament->name}}</h2>
		<h4>Location: {{$tournament->location}}</h4>
		<h6>Date: 
			@if($tournament->date_start == $tournament->date_end)
				{{$tournament->date_start}}
			@else
				{{$tournament->date_start}} to {{ $tournament->date_end }}
			@endif
		</h6>
		<h2>Under organization: {{$organization}} </h2>
		@include('inc.messages')
		<div class="row">
			<div class="col sm-12">
				@foreach($teams as $team)
					<div class="card bg-faded my-3 pt-2">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-sm-12 col-md-3">
									<h6 class="card-title">{{$team->team_name}}</h6>
									<h6 class="card-title subcat-content">{{$team->subcategory_id}}</h6>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="row my-2">
										<div class="col-sm-4">
											Player Names
										</div>
										<div class="col-sm-8 subcat-content">
											Date of Birth
										</div>
									</div>
									<ul style="list-style-type: none; padding-left: 10px;">
										@foreach($team->players as $player)
											<li>
												<div class="row">
													<div class="col-sm-4">
														{{$player['name']}}
													</div>
													<div class="col-sm-8">
														{{$player['date_of_birth']}}
													</div>
												</div>
											</li>
										@endforeach
									</ul>
								</div>
								<div class="col-sm-3 ">
									<div class="row justify-content-center">
										<form action="/participant/editregistration/{{$team->id}}" method="GET">
											@csrf
											<button type="submit" class="btn btn-primary">Edit Team Registration</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection

<script>
	window.onload = () => {
		//Convert subcategories to labelled divisions
		const convertSubcategory = (id) => {
			switch(id) {
				case 'U10':
					return "Under-10 Division"
					break;
				case 'U11':
					return "Under-11 Division"
					break;
				case 'U12':
					return "Under-12 Division"
					break;
				case 'U13':
					return "Under-13 Division"
					break; 
				case 'U14':
					return "Under-14 Division"
					break; 
				case 'U15':
					return "Under-15 Division"
					break; 
				case 'U16':
					return "Under-16 Division"
					break; 
				case 'U17':
					return "Under-17 Division"
					break; 
				case 'U18':
					return "Under-18 Division"
					break;
				case 'MO':
					return "Men's Open Division"
					break;
				default:
					return id;     
			}
		}

		const subcatDom = document.querySelectorAll('.subcat-content');
		subcatDom.forEach((s) => {
			s.textContent = convertSubcategory(s.textContent.trim());
		})
	}
</script>