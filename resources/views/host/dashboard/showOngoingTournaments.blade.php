<h2>Ongoing Tournaments</h2>

<div class="row">
	<div class="col-sm-12">
		@if(count($ongoing) == 0)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							You do not have any ongoing tournament.
						</div>
					</div>
				</div>
			</div>
		@else
		@foreach($ongoing as $o)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-sm-2">
							<img style="width:100%; max-height:25%;" src="{{asset($o->image_path)}}" alt="Tournament poster">
						</div>
						<div class="col-sm-5">
							<h6>Tournament Name</h6>
							<p class="t-info-header">{{ $o->name }}</p>
							<h6>Location:</h6>
							<p class="t-info-header"> {{ $o->location }} </p>
							<h6>Date:</h6>
							<p class="t-info-header">
								@if($o->date_start == $o->date_end)
									{{$o->date_start}}
								@else
									{{$o->date_start}} to {{ $o->date_end }}
								@endif
							</p>
						</div>
						<div class="col-sm-5">
							<form action="/host/tournamentdashboard/{{$o->id}}" method="GET">
								@csrf
								<button type="submit" class="btn btn-outline-primary">Enter Tournament Dashboard</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		@endif
	</div>
</div>