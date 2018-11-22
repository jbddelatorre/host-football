{{-- hide row --}}
<div class="row tournament-table-div">
	<div class="col-sm-12 mb-3">
		<div class="row">
			{{-- Group A Table --}}
			<h3>Group A Table</h3>
			<div class="col-sm-12 table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="table-team-name">Team Name</th>
							<th class="table-organization">Organization</th>
							<th>P</th>
							<th>W</th>
							<th>D</th>
							<th>L</th>
							<th>GF</th>
							<th>GA</th>
							<th>GD</th>
							<th>PTS</th>
						</tr>
					</thead>
					<tbody>
						@foreach($group_tables[$subcat->id]["A"] as $team => $data)
							<tr>
								<td>{{$team_info[$team]['team_name']}}</td>
								<td>
									{{$team_info[$team]['organization']}}
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

			{{-- Group B Table --}}
			<h3>Group B Table</h3>
			<div class="col-sm-12 table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="table-team-name">Team Name</th>
							<th class="table-organization">Organization</th>
							<th>P</th>
							<th>W</th>
							<th>D</th>
							<th>L</th>
							<th>GF</th>
							<th>GA</th>
							<th>GD</th>
							<th>PTS</th>
						</tr>
					</thead>
					<tbody>
						@foreach($group_tables[$subcat->id]["B"] as $team => $data)
							<tr>
								<td>
									{{$team_info[$team]['team_name']}}
								</td>
								<td>
									{{$team_info[$team]['organization']}}
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
									<div class="col-sm-5">Group {{$fixture->group}} Match # {{$fixture->match_order}}</div>
									<div class="col-sm-7 text-right">Fixture type: <span class="fixture-type">{{$fixture->fixture_type->fixture_type}}</span></div>
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
							</div>

							<div class="card-footer" style="padding:5px 15px;">
								<div class="row">
									<div style="font-size:16px;"class="col-sm-12 text-right">
										Status: <span class="status-span">{{$fixture->fixture_status->fixture_status}}</span>
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
									<div class="col-sm-5">Group {{$fixture->group}} Match # {{$fixture->match_order}}</div>
									<div class="col-sm-7 text-right">Fixture type: <span class="fixture-type">{{$fixture->fixture_type->fixture_type}}</span></div>
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
							</div>

							<div class="card-footer" style="padding:5px 15px;">
								<div class="row">
									<div style="font-size:16px;"class="col-sm-12 text-right">
										Status: <span class="status-span">{{$fixture->fixture_status->fixture_status}}</span>
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