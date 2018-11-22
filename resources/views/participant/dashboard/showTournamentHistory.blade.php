<h2>My Tournament History</h2>
<div class="row">
	<div class="col sm-12">
{{-- 		@foreach($my_tournaments as $t) --}}
			@if(count($history) == 0)
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
				@foreach($history as $h)
					<div class="card bg-faded my-3 pt-2">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-sm-2">
									<img style="width:100%; max-height:25%;" src="{{asset($h->image_path)}}" alt="Tournament poster">
								</div>
								<div class="col-sm-7">
									<h6>Tournament Name</h6>
									<p class="t-info-header">{{ $h->name }}</p>
									<h6>Location:</h6>
									<p class="t-info-header"> {{ $h->location }} </p>
									<h6>Date:</h6>
									<p class="t-info-header">
										@if($h->date_start == $h->date_end)
											{{$h->date_start}}
										@else
											{{$h->date_start}} to {{ $h->date_end }}
										@endif
									</p>
								</div>
								<div class="col-sm-3">
									<form action="/participant/gethistory/{{$h->id}}" method="GET">
										@csrf
										<button type="submit" class="btn btn-outline-primary">Enter Tournament Dashboard</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
{{-- 		@endforeach --}}
	</div>
</div>