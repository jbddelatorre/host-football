<h2>Registered Tournaments</h2>

<div class="row">
	<div class="col-sm-12">
		@foreach($tournaments as $t)
			<div class="card bg-faded my-3 pt-2">
				<div class="card-body">
					<h6>Tournament Name</h6>
							<p> {{ $t->name }}</p>
							<h6>Location:</h6>
							<p> {{ $t->location }} </p>
							<h6>Date:</h6>
							<p>
								@if($t->date_start == $t->date_end)
									{{$t->date_start}}
								@else
									{{$t->date_start}} to {{ $t->date_end }}
								@endif
							</p>
					
					<div class="row">
						@foreach($tournament_ids[$t->id] as $subcat)
							<div class="col-sm-3">
								<div class="card my-2">
									<div class="card-header subcat-content">
										{{$subcat}}
									</div>
									<div class="card-body">
										<div class="row justify-content-center">
										<h6>Currently Registered Teams</h6>
											<button class="btn btn-outline-info my-3">View Details</button>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					
					<hr>

					<div class="row justify-content-center py-2">
						<button class="btn btn-primary mx-2">Initialize Tournament</button>
						<button class="btn btn-danger mx-2">Delete Tournament</button>
					</div>

				</div>
			</div>
		@endforeach
	</div>
</div>
