<h2>Create a new Tournament</h2>
	<form id="formRegisterTournament" method="POST" action="/host/registertournament" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-sm-7">
				<div class="form-group">
					<label for="name">Tournament Name</label>
					<input type="text" class="form-control" id="name" name="name">
					<small class="form-text text-muted">Enter desired name</small>
				</div>
				<div class="form-group">
					<label for="location">Tournament Location</label>
					<input type="text" class="form-control" id="location" name="location">
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
				<div class="form-group">
					<label for="poster">Upload Poster</label>
					<input type="file" class="form-control-file" id="poster" name="poster">
				</div>
			</div>
			<div class="col-sm-5">
				<label for="name">Divisions</label>
				@for($x = 10; $x <= 18; $x++)
					<div class="checkbox">
							<label><input style="margin-right:10px;" type="checkbox" id="under{{$x}}" value="U{{$x}}" name="subcategories[]">Under {{$x}}</label>
					</div>
				@endfor
				<div class="checkbox">
						<label><input style="margin-right:10px;" type="checkbox" id="MO" value="MO" name="subcategories[]">Men's Open</label>
				</div>
			</div>
		</div>
		<div class="row mt-4 my-4">
			<div class="col-xs-12" style="margin: 0 auto;">
				<button type="submit" class="btn btn-outline-primary">Register my Tournament</button>
			</div>
		</div>
	</form>
