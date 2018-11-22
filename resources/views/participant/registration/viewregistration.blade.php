@extends('layouts.app')

<style>
	.status-content {
		font-weight: 300;
		letter-spacing: 2px;
	}
	.team-list hr {
		margin: 8px 0;
	}
	.team-title p {
		margin-bottom: 8px;
	}
	.team-title h5 {
		margin-top: 16px;
	}

	.accepted {
		color:#42c742 !important;
	}
	.pending {
		color:#ef9509b5 !important;
	}
	.rejected {
		color:#ff0000 !important;
	}
</style>

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-3"><h5>Tournament Name</h5></div>
			<div class="col-sm-9"><h5>{{$tournament->name}}</h5></div>
		</div>
		<div class="row">
			<div class="col-sm-3"><h5>Location</h5></div>
			<div class="col-sm-9"><h5>{{$tournament->location}}</h5></div>
		</div>
		<div class="row">
			<div class="col-sm-3"><h5>Date</h5></div>
			<div class="col-sm-9"><h5>
				@if($tournament->date_start == $tournament->date_end)
					{{$tournament->date_start}}
				@else
					{{$tournament->date_start}} to {{ $tournament->date_end }}
				@endif
			</h5></div>
		</div>
		<div class="row">
			<div class="col-sm-3"><h5>Organization</h5></div>
			<div class="col-sm-9"><h5>{{$organization}}</h5></div>
		</div>

		<div class="row justify-content-end">
			<div class="col-sm-12 my-2">
				<a class="btn btn-outline-success float-right" href="/participant">Return to Dashboard</a>
			</div>
		</div>

		@include('inc.messages')
		<div class="row">
			<div class="col sm-12">
				@foreach($teams as $team)
					<div class="card bg-faded my-3 pt-2">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-sm-12 col-md-3 team-title">
									<p>Team Name</p>
									<h6 class="t-info-header">{{$team->team_name}}</h6>
									<p>Division</p>
									<h6 class="t-info-header subcat-content">{{$team->subcategory_id}}</h6>
									<p>Name of Coach</p>
									<h6 class="t-info-header">{{$team->coach_name}}</h6>
									<p>Contact Number</p>
									<h6 class="t-info-header">{{$team->mobile_number}}</h6>
									<p>Registration Status</p>
									<h6 class="t-info-header status-content">{{$team->team_registration_status}}</h6>
								</div>
								<div class="col-sm-12 col-md-6 team-list">
									<div class="row my-2">
										<div class="col-sm-6">
											Player Names
										</div>
										<div class="col-sm-6 subcat-content">
											Date of Birth
										</div>
									</div>
									<ul style="list-style-type: none; padding-left: 10px;">
										<hr>
										@foreach($team->players as $player)
											<li style="padding-left: 12px;">
												<div class="row">
													<div class="col-sm-6">
														{{$player['name']}}
													</div>
													<div class="col-sm-6">
														{{$player['date_of_birth']}}
													</div>
												</div>
											</li>
											<hr>
										@endforeach
									</ul>
								</div>

								<div class="col-sm-3 ">
									<div class="row justify-content-center">
										<form action="/participant/editregistration/{{$team->id}}" method="GET">
											@csrf
											<button type="submit" class="btn btn-outline-primary">Edit Team Registration</button>
										</form>
											<button type="submit" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{$team->id}}">Delete Team Registration</button>
										
										{{-- modal --}}
											<div class="modal fade" id="delete{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document" style="transform:translateY(50%);">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        Are you sure you want to delete this team?
											      </div>
											      <div class="modal-footer">
													<form action="/participant/deleteteam/{{$team->id}}" method="POST">
														@csrf
														@method('DELETE')
														<input type="number" hidden name="tournamentId" value={{$team->tournament_id}}>
												        <button type="submit" class="btn btn-outline-danger">Delete</button>
													</form>
											      </div>
											    </div>
											  </div>
											</div>
										{{-- end modal --}}
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

		//Team status update
		const convertTeamStatus = (status) => {
			switch(status) {
				case 'A':
					return 'Approved';
					break;
				case 'R':
					return 'Rejected';
					break;
				case 'P':
					return 'Pending';
					break;
				default:
					return 'Undefined';
			}
		}
		
		const transformTeamStatus = () => {
			const statusDom = document.querySelectorAll('.status-content')
			statusDom.forEach(s => {
				const stat = s.textContent;

				if(stat == 'A') {
					s.classList.add('accepted');
				} 
				if (stat == 'R') {
					s.classList.add('rejected')
				} 
				if (stat == 'P') {
					s.classList.add('pending')
				}
				
				s.textContent = convertTeamStatus(s.textContent);
			})
		}

		transformTeamStatus();
	}
</script>