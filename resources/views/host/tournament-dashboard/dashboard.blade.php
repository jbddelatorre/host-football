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
		<div class="row">
			<h1>Name: {{$tournament->name}}</h1>
		</div>

		<div class="row">
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
						<div class="col-sm-6">
							
						</div>

						{{-- Group B Table --}}
						<div class="col-sm-6">
							
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
														    	<input type="number" class="form-control" name="" min=0>
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
														    	<input type="number" class="form-control" name="" min=0>
														    	<label>Score</label>
														 	 </div>
														</div>
														<div class="col-sm-8 text-center">
															<h5>{{$team_info[$fixture->a_team]['team_name']}}</h5>
															<p>{{$team_info[$fixture->a_team]['organization']}}</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12 text-center">
													<button class="btn btn-outline-success">Update Score</button>
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
														    	<input type="number" class="form-control" name="" min=0>
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
														    	<input type="number" class="form-control" name="" min=0>
														    	<label>Score</label>
														 	 </div>
														</div>
														<div class="col-sm-8 text-center">
															<h5>{{$team_info[$fixture->a_team]['team_name']}}</h5>
															<p>{{$team_info[$fixture->a_team]['organization']}}</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12 text-center">
													<button class="btn btn-outline-success">Update Score</button>
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
}

</script>