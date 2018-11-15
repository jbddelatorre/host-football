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

	.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
	}

	.btn-circle {
	    width: 30px;
	    height: 30px;
	    padding: 6px 0px;
	    border-radius: 15px;
	    text-align: center;
	    font-size: 12px;
	    line-height: 1.42857;
	}


</style>

@section('content')
	<div class="container">
		<h2>Tournament Registration</h2>
		@include('inc.messages')
		<form action="/participant/registration/{{$tournament->id}}" method="POST">
			@csrf
		<div class="row">
			<input type="text" hidden name="tournamentId" value="{{$tournament->id}}">
			<input type="text" hidden name="teamId" value="{{$team->id}}">
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
						<input class="subcat-radio" type="radio" id="radio{{$team->subcategory_id}}"name="subcategory" value={{$team->subcategory_id}}>
						<label class="subcat-content"for="radio{{$team->subcategory_id}}">{{$team->subcategory_id}}</label>
					</div>
				
					<div class="card-body">
						<h6>Team Name</h6>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control {{$errors->has('teamname') ? 'is-invalid' : ''}}" id="teamName" name="teamname" value="{{$team->team_name}}">
									<div class="invalid-feedback">
										{{$errors->first('teamname')}}
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="card-body players-form-list" id="playerFillout">
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

						<div id="playerCountData" data-players-count={{count($players)}}></div>

						@if($errors->has('players'))
							<div class="alert alert-danger">
								{{$errors->first('players')}}
							</div>
						@endif

						{{-- SCRIPT INSERT PLAYER FORM --}}		
						@for($i = 0; $i < count($players); $i++)
							<div class="form-group">
								<div class="row">
									<div class="col-sm-7">
										<input type="text" value="{{$players[$i]['name']}}" class="players-name form-control {{$errors->has('players.'.$i.'.name') ? 'is-invalid':''}}" name="players[{{$i}}][name]">

										<div class="invalid-feedback">
											{{$errors->first('players.'.$i.'.name')}}
										</div>
									</div>
									<div class="col-sm-5">
										<input type="date" id="date{{$i}}" class="players-date form-control {{$errors->has('players.'.$i.'.dob') ? 'is-invalid':''}}" name="players[{{$i}}][dob]" value={{$players[$i]['date_of_birth']}}>
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
									<input type="text" class="form-control" id="coachName" name="coachname" value="{{$team->coach_name}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-2">
									<label for="coachMobile">Mobile Number</label>
								</div>
								<div class="col-sm-6">
									<input type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" class="form-control" id="coachMobile" name="coachmobile" value={{$team->mobile_number}}>
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
	const formAdd = document.querySelector('#formAdd')
	const formRemove = document.querySelector('#formRemove')

		//Remove default
	buttons.forEach((b) => {
		b.addEventListener("click", (e) => {
			e.preventDefault();
		})
	})
		
		//Add form functionality
	formAdd.addEventListener("click", () => {
		const playerCountDOM = document.querySelector('#playerCountData')
		const playerCount = playerCountDOM.getAttribute('data-players-count')

		$('.players-form-list').append(`
			<div class="form-group">
				<div class="row">
					<div class="col-sm-7">
						<input type="text" class="players-name form-control name="players[${playerCount - 1}][name] placeholder='Enter Full Name'">
					</div>
					<div class="col-sm-5">
						<input type="date" id="date${playerCount - 1}" class="players-date form-control" name="players[{${playerCount - 1}}][dob]">
					</div>
				</div>
			</div>
		`)

		const countname = document.querySelectorAll('.players-name').length
		const countdob = document.querySelectorAll('.players-date').length

		if (countname !== countdob) {
			count = countname < countdob ? countname:countdob
		} else {
			count = countname
		}

		playerCountDOM.setAttribute('data-players-count', count);
		console.log(playerCountDOM.getAttribute('data-players-count'))
	})

}

</script>