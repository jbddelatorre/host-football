<style>
	.modal-backdrop {
    z-index: 1040;
}

.modal {
    z-index: 9999;
    background-color:transparent!important;
}
</style>

<h2>My Tournaments</h2>
<div class="row">
	<div class="col-sm-12">
		@if(count($tournaments) == 0)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							You do not have any registered tournament.
						</div>
					</div>
				</div>
			</div>
		@else
			@foreach($tournaments as $t)
				<div class="card bg-faded my-3 pt-2">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-2">
								<img style="width:100%; max-height:25%;" src="{{asset($t->image_path)}}" alt="Tournament poster">
							</div>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-3 t-info">Tournament Name:</div>
									<div class="col-sm-6 t-info-header">{{ $t->name }}</div>
								</div>
								<div class="row">
									<div class="col-sm-3 t-info">Location:</div>
									<div class="col-sm-9 t-info-header">{{ $t->location }}</div>
								</div>
								<div class="row mb-4">
									<div class="col-sm-3 t-info">Date:</div>
									<div class="col-sm-9 t-info-header">
										@if($t->date_start == $t->date_end)
										{{$t->date_start}}
									@else
										{{$t->date_start}} to {{ $t->date_end }}
									@endif
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="row">
									<div class="col-sm-12 text-right">
										<form method="GET" action="/host/edittournament/{{$t->id}}">
											@csrf
											<button type="submit" class="btn btn-outline-danger">Edit Tournament</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							@foreach($tournament_ids[$t->id] as $subcat => $teams)
								<div class="col-sm-12">
									<div class="card my-2">
										<div class="card-header subcat-content">
											{{$subcat}}
										</div>
										<div class="card-body">
											<div class="card-title">
												<h6>Currently Registered Teams</h6>
												<h6>Total number teams applied: {{count($teams)}}</h6>
											</div>
											<div class="card-body">
												@if(count($teams) > 0)
													<div class="row mb-2">
														<div class="col-sm-3 text-center">Team Name</div>
														<div class="col-sm-4 text-center">Organization</div>
														<div class="col-sm-2 text-center">Status</div>
														<div class="col-sm-3 text-center">Actions</div>
													</div>

													<hr>
						
													@foreach($teams as $team)

														<div class="row my-2" row-team={{$team->id}}>
															<div class="col-sm-3 text-center">{{$team->team_name}}</div>
															<div class="col-sm-4 text-center">{{$team->user->organization}}</div>
															<div team-id-status={{$team->id}} class="col-sm-2 text-center status-content">{{$team->team_registration_status}}</div>
															<div class="col-sm-3 text-center">
																<i style="color:green;" class="fa-lg far fa-check-circle circle-button
																	@if($team->team_registration_status == 'A')
																		disable-circle-button
																	@endif
																" data-team-id="{{$team->id}}" data-action="A"></i> | 
																<i style="color:red;" class="fa-lg far fa-times-circle circle-button
																	@if($team->team_registration_status == 'R')
																		disable-circle-button
																	@endif
																" data-team-id="{{$team->id}}" data-action="R"></i> | 
																<i style="color:orange;" class="fa-lg far fa-stop-circle circle-button
																	@if($team->team_registration_status == 'P')
																		disable-circle-button
																	@endif
																" data-team-id="{{$team->id}}" data-action="P"></i>
															</div>
														</div>
														<hr>
													@endforeach
												@else
													<div class="row justify-content-center mt-4">
														No registered team.
													</div>
												@endif
											</div>
											
											<form action="/host/viewregistration/{{$t->id}}/{{$subcat}}" method="
											GET">
											@csrf
											<div class="row justify-content-center">
												<button type="submit" class="btn btn-outline-info my-3">View Details</button>
											</div>
											</form>
										</div>
									</div>
								</div>
							@endforeach
						</div>
						
						<hr>
						
						<div class="row justify-content-center py-2">
							<form action="/host/initialize/{{$t->id}}" method="GET" style="margin:0;">	
								@csrf
								<button class="btn btn-outline-primary mx-2">Initialize Tournament</button>
							</form>
							<button type="submit" class="btn btn-outline-danger mx-2" data-toggle="modal" data-target="#deleteT{{$t->id}}">Delete Tournament</button>
							<div class="row">
						</div>
						</div>
					</div>
				</div>
				<hr>
			@endforeach
		@endif
	</div>
</div>

<script>
	
	const scriptShowRegisteredTournaments = () => {
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
				s.textContent = convertTeamStatus(s.textContent);
			})
		}


		const teamButtons = () => {
			const buttons = document.querySelectorAll('.circle-button');
			const statusDom = document.querySelectorAll('.status-content')

			buttons.forEach(b => {
				b.addEventListener("click", (event) => {

					//UI RESPONSE
					const teamid = b.getAttribute('data-team-id');
					const action = b.getAttribute('data-action');

					const team_status_dom = document.querySelector(`[team-id-status="${teamid}"]`);
					const team_buttons = document.querySelectorAll(`[data-team-id="${teamid}"]`);

					team_buttons.forEach(but => {
						but.classList.remove('disable-circle-button')
					})
					b.classList.add('disable-circle-button');
					team_status_dom.textContent = convertTeamStatus(action);

					//AJAX CALL
					
					const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
					const url = `/host/updateteamstatus/${teamid}`;


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
							status: action,
						})
					})
					.then(response => response.json())
					.then(data => {
						if(data.status !== action) {
							throw "Action mismatch."
						}
					})
					.catch(err => console.log(err));
				})
			})
		}


		transformTeamStatus();
		teamButtons();
	}


</script>