<h2>Tournament List</h2>
<div class="row">
	<div class="col sm-12">
		@if(count($tournaments) == 0)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							There are currently no available tournaments as of now.
						</div>
					</div>
				</div>
			</div>
		@else
		@foreach($tournaments as $t)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-sm-2">
							<img style="width:100%; max-height:25%;" src="{{asset($t->image_path)}}" alt="Tournament poster">
						</div>
						<div class="col-sm-3">
							<p>Tournament Name</p>
							<h6 class="card-title t-info-header">{{$t->name}}</h6>
							<p>Location</p>
							<h6 class="card-title t-info-header">{{$t->location}}</h6>
							<p>Date</p>
							<h6 class="card-title t-info-header">
								@if($t->date_start == $t->date_end)
									{{$t->date_start}}
								@else
									{{$t->date_start}} to {{ $t->date_end }}
								@endif
							</h6>	
						</div>
						<div class="col-sm-4">
							<h6 class="card-title">Divisions</h6>
							<ul style="list-style-type: none;">
								@foreach($findTournament_ids[$t->id] as $subcat)
									<li class="subcat-content">{{$subcat}}</li>
								@endforeach
							</ul>
						</div>
						<div class="col-sm-3 ">
							<div class="row justify-content-center">
								<form method="GET" action="/participant/registration/{{$t->id}}">
									<button type="submit" class="btn btn-outline-primary">Register</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		@endif
	</div>
</div>
