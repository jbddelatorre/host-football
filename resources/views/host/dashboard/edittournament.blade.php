@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Edit Tournament</h2>
		@include('inc.messages')
		<form id="formRegisterTournament" method="POST" action="/host/submitedittournament/{{$tournament->id}}">
			@csrf
			<input type="text" hidden name="edit" value="edittournament">
			<div class="row">
				<div class="col-sm-7">
					<div class="form-group">
						<label for="name">Tournament Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{$tournament->name}}">
						<small class="form-text text-muted">Enter desired name</small>
					</div>
					<div class="form-group">
						<label for="location">Tournament Location</label>
						<input type="text" class="form-control" id="location" name="location" value="{{$tournament->location}}">
						<small class="form-text text-muted">Enter location</small>
					</div>
					<div class="form-group">
						<label for="startdate">Start Date</label>
						<input type="date" class="form-control" id="startdate" name="startdate">
					</div>
					<div class="checkbox">
							<label><input style="margin-right:10px;" type="checkbox" id="sameDayCheckbox" value="0" name="onedaytournament">One-day Tournament</label>
					</div>
					<div class="form-group">
						<label for="enddate">End Date</label>
						<input type="date" class="form-control" id="enddate" name="enddate">
					</div>
				</div>
				<div class="col-sm-5">
					<label for="name">Divisions</label>
					@for($x = 10; $x <= 18; $x++)
						<div class="checkbox">
							<label><input style="margin-right:10px;" type="checkbox" id="under{{$x}}" value="U{{$x}}" name="subcategories[]"
								@foreach($tournament->subcategories as $sub)
									@if($sub->id == 'U'.$x)
										{{'checked'}}
									@endif
								@endforeach
							>Under {{$x}}</label>
						</div>
					@endfor
					<div class="checkbox">
							<label><input style="margin-right:10px;" type="checkbox" id="MO" value="MO" name="subcategories[]">Men's Open</label>
					</div>
				</div>
			</div>
			<div class="row mt-4 my-4">
				<div class="col-xs-12" style="margin: 0 auto;">
					<button type="submit" class="btn btn-outline-primary">Edit my Tournament</button>
				</div>
			</div>
		</form>
	</div>
@endsection

<script>
	window.onload = () => {
		// Disables end-date when one-day tournament is checked
		const sameDayCheckbox = document.querySelector('#sameDayCheckbox')
		const endDateInput = document.querySelector('#enddate')
		
		
		sameDayCheckbox.addEventListener("click", (e) => {
			sameDayCheckbox.value = 1 - e.target.value;

			if (sameDayCheckbox.value == 1) {
				endDateInput.setAttribute("disabled", true)
			} else {
				endDateInput.removeAttribute("disabled", '')
			}
		})
	}

</script>