@extends('layouts.app')

<style>
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	}

	input[type=number] {
	  -moz-appearance: textfield;
	}
</style>

@section('content')
	<div class="container">
		<input id="tournamentIdInfo" readonly type="number" hidden value="{{$tournament->id}}">
		<div class="row">
			<h1>Name: {{$tournament->name}}</h1>
		</div>

		<div class="row mb-4">
			@foreach($tournament->subcategories as $subcat)
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title subcat-card subcat-content" data-subcat="1">{{$subcat->subcategory}}</h5>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		
		{{-- RESTRUCTURE THIS PART - move to another file --}}
		@foreach($tournament->subcategories as $subcat)
			{{-- hide row --}}
			<div class="row">
				<div class="col-sm-12 mb-3">
					<div class="row">
						{{-- Group A Table --}}
						<div class="col-sm-12">
							<h5>Group A Table</h5>
							<table class="table table-bordered">
								<colgroup>
						            <col class="col-md-4">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						        </colgroup>
								<thead>
									<tr>
										<th scope="col">Team Name</th>
										<th scope="col">P</th>
										<th scope="col">W</th>
										<th scope="col">D</th>
										<th scope="col">L</th>
										<th scope="col">GF</th>
										<th scope="col">GA</th>
										<th scope="col">GD</th>
										<th scope="col">PTS</th>
									</tr>
								</thead>
								<tbody>
									@foreach($group_tables[$subcat->id]["A"] as $team => $data)
										<tr>
											<th scope="row">{{$team_info[$team]['team_name']}}</th>
											<td>{{$data['played']}}</td>
											<td>{{$data['wins']}}</td>
											<td>{{$data['draws']}}</td>
											<td>{{$data['losses']}}</td>
											<td>{{$data['goals_for']}}</td>
											<td>{{$data['goals_against']}}</td>
											<td>{{$data['goal_difference']}}</td>
											<td>{{$data['points']}}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						{{-- Group B Table --}}
						<div class="col-sm-12">
							<h5>Group B Table</h5>
							<table class="table table-bordered">
								<colgroup>
						            <col class="col-md-2">
						            <col class="col-md-2">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						            <col class="col-md-1">
						        </colgroup>
								<thead>
									<tr>
										<th scope="col">Team Name</th>
										<th scope="col">Organization</th>
										<th scope="col">P</th>
										<th scope="col">W</th>
										<th scope="col">D</th>
										<th scope="col">L</th>
										<th scope="col">GF</th>
										<th scope="col">GA</th>
										<th scope="col">GD</th>
										<th scope="col">PTS</th>
									</tr>
								</thead>
								<tbody>
									@foreach($group_tables[$subcat->id]["B"] as $team => $data)
										<tr>
											<th scope="row">
												<h5>{{$team_info[$team]['team_name']}}</h5>
											</th>
											<td>
												<h5>{{$team_info[$team]['organization']}}</h5>
											</td>
											<td>{{$data['played']}}</td>
											<td>{{$data['wins']}}</td>
											<td>{{$data['draws']}}</td>
											<td>{{$data['losses']}}</td>
											<td>{{$data['goals_for']}}</td>
											<td>{{$data['goals_against']}}</td>
											<td>{{$data['goal_difference']}}</td>
											<td>{{$data['points']}}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row justify-content-center">
						<h5>Group A</h5>
					</div>
					<div class="row">
						@foreach($subcat->fixtures as $fixture)
							@if($fixture->group == 'A')
								<div class="col-sm-12">
									<div class="card my-2">
										<div class="card-header">
											<div class="row">
												<div class="col-sm-6">Group {{$fixture->group}} Match # {{$fixture->match_order}}</div>
												<div class="col-sm-6 text-right">Fixture type: {{$fixture->fixture_type->fixture_type}}</div>
											</div>
										</div>

										{{-- SCORE --}}
										<div class="card-body text-center">
											<div class="row">
												{{-- GROUP A - Team A --}}
												<div class="col-sm-5">
													<div class="row">
														<div class="col-sm-8 text-center">
															<h5>{{$team_info[$fixture->a_team]['team_name']}}</h5>
															<p>{{$team_info[$fixture->a_team]['organization']}}</p>
														</div>
														<div class="col-sm-4">
															<div class="form-group">
														    	<input disabled type="number" class="form-control" value="{{$fixture->a_score}}" data-score-A-id = {{$fixture->id}} min=0>
														    	<label>Score</label>
														 	 </div>
														</div>
													</div>
												</div>

												<div class="col-sm-2 text-center my-auto">VS</div>

												{{-- GROUP A - Team B --}}
												<div class="col-sm-5">
													<div class="row">
														<div class="col-sm-4">
															<div class="form-group">
														    	<input disabled type="number" class="form-control" value="{{$fixture->b_score}}" data-score-B-id = {{$fixture->id}} name="" min=0>
														    	<label>Score</label>
														 	 </div>
														</div>
														<div class="col-sm-8 text-center">
															<h5>{{$team_info[$fixture->b_team]['team_name']}}</h5>
															<p>{{$team_info[$fixture->b_team]['organization']}}</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12 text-center">
													<button class="btn btn-outline-info fixture-edit-button"  data-edit-fixture = "{{$fixture->id}}">Edit Score</button>
													<button class="btn btn-outline-success fixture-submit-button" data-fixture-id = "{{$fixture->id}}">Update Score</button>
												</div>
											</div>
										</div>

										<div class="card-footer" style="padding:5px 15px;">
											<div class="row">
												<div style="font-size:16px;"class="col-sm-12 text-right">
													Status: {{$fixture->fixture_status->fixture_status}}
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>

				{{-- GROUP B - JUST COPY GROUP A WHEN FINISHED --}}
				<div class="col-sm-6">
					<div class="row justify-content-center">
						<h5>Group B</h5>
					</div>
					<div class="row">
						@foreach($subcat->fixtures as $fixture)
							@if($fixture->group == 'B')
								<div class="col-sm-12">
									<div class="card my-2">
										<div class="card-header">
											<div class="row">
												<div class="col-sm-6">Group {{$fixture->group}} Match # {{$fixture->match_order}}</div>
												<div class="col-sm-6 text-right">Fixture type: {{$fixture->fixture_type->fixture_type}}</div>
											</div>
										</div>

										{{-- SCORE --}}
										<div class="card-body text-center">
											<div class="row">
												{{-- GROUP B - Team A --}}
												<div class="col-sm-5">
													<div class="row">
														<div class="col-sm-8 text-center">
															<h5>{{$team_info[$fixture->a_team]['team_name']}}</h5>
															<p>{{$team_info[$fixture->a_team]['organization']}}</p>
														</div>
														<div class="col-sm-4">
															<div class="form-group">
														    	<input disabled type="number" class="form-control" value="{{$fixture->a_score}}"name="" min=0 data-score-A-id = {{$fixture->id}}>
														    	<label>Score</label>
														 	 </div>
														</div>
													</div>
												</div>

												<div class="col-sm-2 text-center my-auto">VS</div>

												{{-- GROUP B - Team B --}}
												<div class="col-sm-5">
													<div class="row">
														<div class="col-sm-4">
															<div class="form-group">
														    	<input disabled type="number" value="{{$fixture->b_score}}"class="form-control" name="" min=0 data-score-B-id = {{$fixture->id}}>
														    	<label>Score</label>
														 	 </div>
														</div>
														<div class="col-sm-8 text-center">
															<h5>{{$team_info[$fixture->b_team]['team_name']}}</h5>
															<p>{{$team_info[$fixture->b_team]['organization']}}</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12 text-center">
													<button class="btn btn-outline-info fixture-edit-button"  data-edit-fixture = "{{$fixture->id}}">Edit Score</button>
													<button class="btn btn-outline-success fixture-submit-button" data-fixture-id = "{{$fixture->id}}">Update Score</button>
												</div>
											</div>
										</div>

										<div class="card-footer" style="padding:5px 15px;">
											<div class="row">
												<div style="font-size:16px;"class="col-sm-12 text-right">
													Status: {{$fixture->fixture_status->fixture_status}}
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		@endforeach
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


	//DOM buttons
	const editButton = document.querySelectorAll('.fixture-edit-button');
	const submitButton = document.querySelectorAll('.fixture-submit-button');


		//Remove disable from inputs

		editButton.forEach(b => {
			b.addEventListener("click", (e) => {
				const fixture_id = e.target.attributes.getNamedItem('data-edit-fixture').value;
				const input_A = document.querySelector(`[data-score-A-id="${fixture_id}"]`);
				const input_B = document.querySelector(`[data-score-B-id="${fixture_id}"]`);

				input_A.disabled = false;
				input_B.disabled = false;
			})
		})

		//Submit updated score input

		submitButton.forEach(b => {
			b.addEventListener("click", (e) => {
				const fixture_id = e.target.attributes.getNamedItem('data-fixture-id').value;
				const input_A = document.querySelector(`[data-score-A-id="${fixture_id}"]`);
				const input_B = document.querySelector(`[data-score-B-id="${fixture_id}"]`);
				if (input_A.disabled || input_B.disabled) {
					return null;
				}
				
				scoreA = input_A.value;
				scoreB = input_B.value;

				console.log(scoreA)
				console.log(scoreB)
				//AJAX CALL
					
				const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				const url = `/host/tournamentdashboard/updatescore`;
				
				fetch(url, {
					headers: {
						"Content-Type": "application/json",
						"Accept": "application/json, text-plain, */*",
						"X-Requested-With": "XMLHttpRequest",
						"X-CSRF-TOKEN": token
					},
					method: 'post',
					credentials: "same-origin",
					body: JSON.stringify({
						fixture_id: fixture_id,
						a_score: scoreA,
						b_score: scoreB,
					})
				})
				.then(response => response.json())
				.then(data => {
					const tournamentId = document.querySelector('#tournamentIdInfo').value;
					window.location.href = `/host/tournamentdashboard/${tournamentId}`;
				})
				.catch(err => console.log(err));
				
				input_A.disabled = true;
				input_B.disabled = true;
			})
		})
}

</script>