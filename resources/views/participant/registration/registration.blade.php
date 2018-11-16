@extends('layouts.app')

<style>
	.subcat-content {
	  display: inline-block;
	  width: 200px;
	  padding: 10px;
	  border: solid 2px #ccc;
	  transition: all 0.3s;
	  text-align: center;
	}

	form input[type="radio"] {
	  display: none;
	}

	form input[type="radio"]:checked + label {
	  border: solid 2px green;
	  color: green;
	  background-color: #e4ffeb;
	}
</style>

@section('content')
	<div class="container">
		<h2>Tournament Registration</h2>

		<div class="row justify-content-end">
			<div class="col-sm-12">
				<a class="btn btn-success float-right" href="/participant">Return to Dashboard</a>
			</div>
		</div>
		
		@include('inc.messages')
		<form action="/participant/registration/{{$id}}" method="POST">
			@csrf
		<div class="row">
			<input type="text" hidden name="tournamentId" value="{{$id}}">
			<div class="col sm-12">
				<div class="card bg-faded my-3 pt-2">
					<div class="card-body">
						<h6>{{$tournament->name}}</h6>
						<h6>{{$tournament->location}}</h6>
						<h6>
							@if($tournament->date_start == $tournament->date_end)
								{{$tournament->date_start}}
							@else
								{{$tournament->date_start}} to {{ $tournament->date_end }}
							@endif
						</h6>
					</div>

					<div class="card-body">
						<h6>Choose a division</h6>
						@foreach($subcats as $sub)
							<input class="subcat-radio" type="radio" id="radio{{$sub->id}}"name="subcategory" value={{$sub->subcategory_id}}>
							<label class="subcat-content"for="radio{{$sub->id}}">{{$sub->subcategory_id}}</label>
						@endforeach
{{-- 							<input type="radio" id="radio{{$sub->id}}"name="subcategory" value={{$sub->subcategory_id}}> --}}
					</div>
				
					<div class="card-body">
						<h6>Team Name</h6>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control {{$errors->has('teamname') ? 'is-invalid' : ''}}" id="teamName" name="teamname">
									<div class="invalid-feedback">
										{{$errors->first('teamname')}}
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="card-body" id="playerFillout">
						<h6>Team Members</h6>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-7">
									<h6>Player Name</h6>
								</div>
								<div class="col-sm-5">
									<h6>Date of Birth</h6>
								</div>
							</div>
						</div>
						
						@if($errors->has('players'))
							<div class="alert alert-danger">
								{{$errors->first('players')}}
							</div>
						@endif

						{{-- SCRIPT INSERT PLAYER FORM --}}
						@for($i = 0; $i < 8; $i++)
							<div class="form-group">
								<div class="row">
									<div class="col-sm-7">
										<input type="text" class="players-name form-control {{$errors->has('players.'.$i.'.name') ? 'is-invalid':''}}" name="players[{{$i}}][name]" placeholder="Enter Full Name">
										<div class="invalid-feedback">
											{{$errors->first('players.'.$i.'.name')}}
										</div>
									</div>
									<div class="col-sm-5">
										<input type="date" id="date{{$i}}" class="players-date form-control {{$errors->has('players.'.$i.'.dob') ? 'is-invalid':''}}" name="players[{{$i}}][dob]">
										<div class="invalid-feedback">
											{{$errors->first('players.'.$i.'.dob')}}
										</div>
									</div>
								</div>
							</div> 
						@endfor

					</div>
			
					<div class="card-body">
						<div class="row justify-content-center">
							<button id="formAdd" class="button-player-fillout btn btn-outline-primary mx-2">Add Player</button>
							<button id="formRemove" class="button-player-fillout btn btn-outline-danger mx-2">Delete</button>
						</div>
					</div>
						
					<div class="card-body">
						<h6>Contact Person Details</h6>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-2">
									<label for="coachName">Name of Coach</label>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="coachName" name="coachname">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-2">
									<label for="coachMobile">Mobile Number</label>
								</div>
								<div class="col-sm-6">
									<input type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" class="form-control" id="coachMobile" name="coachmobile">
									<small class="form-text text-muted">Format: 0917-123-4567</small>
								</div>
							</div>
						</div>	
					</div>


					<div class="card-body">
						<div class="row justify-content-center">
							<button class="btn btn-primary" type="submit">Complete Registration</button>
						</div>
					</div>

				</div>
			</div>
		</div>

		</form>

	</div>

@endsection

<script>
	window.onload = () => {
	//Convert subcategories to labelled divisions
	const convertSubcategory = (id) => {
		switch(id) {
			case 'U10':
				return "Under-10 Division"
				break;
			case 'U11':
				return "Under-11 Division"
				break;
			case 'U12':
				return "Under-12 Division"
				break;
			case 'U13':
				return "Under-13 Division"
				break; 
			case 'U14':
				return "Under-14 Division"
				break; 
			case 'U15':
				return "Under-15 Division"
				break; 
			case 'U16':
				return "Under-16 Division"
				break; 
			case 'U17':
				return "Under-17 Division"
				break; 
			case 'U18':
				return "Under-18 Division"
				break;
			case 'MO':
				return "Men's Open Division"
				break;
			default:
				return id;     
		}
	}

	const subcatDom = document.querySelectorAll('label.subcat-content');
	subcatDom.forEach((s) => {
		s.textContent = convertSubcategory(s.textContent.trim());
	})

	//Set initial value of radio button input
	document.querySelector('.subcat-radio').checked = true

	//Manipulate Player form sheet

	// const addPlayerForm = (number) => {
	// 	$('#playerFillout').append(`
			
	// 	`)
	// }

	// for(let i = 0; i < 8; i++) {
	// 	addPlayerForm(i);
	// }


	//Add/Remove players Form

	const buttons = document.querySelectorAll('.button-player-fillout')

		//Remove default
	buttons.forEach((b) => {
		b.addEventListener("click", (e) => {
			e.preventDefault();
		})
	})

	//Generate random dates
	const dateInputs = document.querySelectorAll('.players-date')
	const nameInputs = document.querySelectorAll('.players-name')

	const sample = () => {
		for(let i = 0; i < dateInputs.length; i++) {
			dateInputs[i].value = '1990-12-12'
			nameInputs[i].value = 'Sample name'
		}
	}

	sample()
}

</script>