<h2>Tournaments History</h2>

<div class="row">
	<div class="col-sm-12">
		@foreach($completed as $c)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-sm-7">
							<h6>Tournament Name</h6>
							<p> {{ $c->name }}</p>
							<h6>Location:</h6>
							<p> {{ $c->location }} </p>
							<h6>Date:</h6>
							<p>
								@if($c->date_start == $c->date_end)
									{{$c->date_start}}
								@else
									{{$c->date_start}} to {{ $c->date_end }}
								@endif
							</p>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>