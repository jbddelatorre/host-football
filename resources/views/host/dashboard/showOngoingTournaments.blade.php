<h2>Ongoing Tournaments</h2>

<div class="row">
	<div class="col-sm-12">
		@foreach($ongoing as $o)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-sm-7">
							<h6>Tournament Name</h6>
							<p> {{ $o->name }}</p>
							<h6>Location:</h6>
							<p> {{ $o->location }} </p>
							<h6>Date:</h6>
							<p>
								@if($o->date_start == $o->date_end)
									{{$o->date_start}}
								@else
									{{$o->date_start}} to {{ $o->date_end }}
								@endif
							</p>
						</div>
						<div class="col-sm-5">
							<button class="btn btn-primary">Enter Tournament Dashboard</button>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>