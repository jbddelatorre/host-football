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
		<form action="">
		<div class="row">
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
							<input type="radio" id="radio{{$sub->id}}"name="subcategory" value={{$sub->subcategory_id}}>
					</div>
				
					<div class="card-body">
						<h6>Team Name</h6>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="teamName" name="teamname">
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
						{{-- SCRIPT INSERT PLAYER FORM --}}
					</div>
			
					<div class="card-body">
						<div class="row justify-content-center">
							<button id="formAdd" class="btn btn-outline-primary mx-2">Add</button>
							<button id="formRemove" class="btn btn-outline-danger mx-2">Remove</button>
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
									<label for="coachContact">Mobile Number</label>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="coachContact" name="coachcontact">
								</div>
							</div>
						</div>	
					</div>


					<div class="card-body">
						<div class="row justify-content-center">
							<button class="btn btn-primary">Complete Registration</button>
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

	const addPlayerForm = (number) => {
		$('#playerFillout').append(`
			<div class="form-group">
				<div class="row">
					<div class="col-sm-7">
						<input type="text" class="form-control" name="players[player${number}][name]" placeholder="Enter Full Name">
					</div>
					<div class="col-sm-5">
						<input type="date" class="form-control" name="players[player${number}][dob]">
					</div>
				</div>
			</div>
		`)
	}

	for(let i = 1; i <= 8; i++) {
		addPlayerForm(i);
	}

}

</script>