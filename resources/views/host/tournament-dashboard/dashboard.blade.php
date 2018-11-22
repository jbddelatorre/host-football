@extends('layouts.app')

<style>
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	}

	input[type=number] {
	  -moz-appearance: textfield;
	}

	.tournament-table-div table {
		table-layout: fixed;
		word-wrap: break-word;
	}
	.table-team-name {
		width:30%;
	}
	.table-organization {
		width:30%;
	}
	.tournament-table-div td, 
	.tournament-table-div th {
		text-align: center;
	}

	.tournament-table-div thead,
	.tournament-table-div tbody {
		width:100%;
	}

	.fixture-type {
		letter-spacing: 1px;
		padding-left: 5px;
		color:#000;
		font-weight: 400;
	}

	.scheduled-color {
		color:red;
	}

	.completed-color {
		color:green;
	}

	.status-span {
		font-weight: 500;
		letter-spacing: 2px;
		text-transform: uppercase;
	}

	.subcat-card-view{
		transition: all .2s ease-out;
	}

	.subcat-card-clicked {
		background-color: #8cea8c !important;
	}
	.subcat-card-view:hover {
		background-color: #dcffdc;
	}

	.subcat-card-view h5 {
		text-align: center;
	}


</style>

@section('content')
	<div class="container">
		<input id="tournamentIdInfo" readonly type="number" hidden value="{{$tournament->id}}">
		<hr>
		<div class="row">
			<div class="col-sm-3"><h5>Tournament Name</h5></div>
			<div class="col-sm-8"><h2>{{$tournament->name}}</h2></div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-3"><h5>Tournament Location</h5></div>
			<div class="col-sm-8"><h3>{{$tournament->location}}</h3></div>
		</div>
		<hr>

		<div class="row">
			<div class="col-sm-6 text-left my-4">
				<a href="/host" class="btn btn-outline-primary">Return to Dashboard</a>
			</div>
			<div class="col-sm-6 text-right my-4">
				<form method="POST" action="/host/tournamentdashboard/complete/{{$tournament->id}}">
					@csrf
					<button class="btn btn-outline-primary" >Complete Tournament</button>
				</form>
			</div>
		</div>

		@include('inc.messages')

		<div class="row mb-4">
			@foreach($tournament->subcategories as $subcat)
				<div class="col-sm-3">
					<div class="card subcat-card-view" data-subcat={{$subcat->id}}>
						<div class="card-body" data-subcat={{$subcat->id}}>
							<h5 class="subcat-card subcat-content"  data-subcat={{$subcat->id}}>{{$subcat->subcategory}}</h5>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		{{-- RESTRUCTURE THIS PART - move to another file --}}
		@foreach($tournament->subcategories as $subcat)

			<div class="animated fadeIn subcat-div hide-view" data-subcat-div = {{$subcat->id}}>
				@include('host.tournament-dashboard.fixtures');
			</div>
		@endforeach
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

	const subcatDom = document.querySelectorAll('.subcat-content');
	subcatDom.forEach((s) => {
		s.textContent = convertSubcategory(s.textContent.trim());
	})


	//DOM buttons
	const editButton = document.querySelectorAll('.fixture-edit-button');
	const submitButton = document.querySelectorAll('.fixture-submit-button');


		//Remove disable from inputs
		editButton.forEach(b => {
			b.addEventListener("click", (e) => {
				const fixture_id = e.target.attributes.getNamedItem('data-edit-fixture').value;
				const input_A = document.querySelector(`[data-score-A-id="${fixture_id}"]`);
				const input_B = document.querySelector(`[data-score-B-id="${fixture_id}"]`);

				input_A.disabled = !input_A.disabled;
				input_B.disabled = !input_B.disabled;
			})
		})

		//Submit updated score input

		submitButton.forEach(b => {
			b.addEventListener("click", (e) => {
				const fixture_id = e.target.attributes.getNamedItem('data-fixture-id').value;
				const input_A = document.querySelector(`[data-score-A-id="${fixture_id}"]`);
				const input_B = document.querySelector(`[data-score-B-id="${fixture_id}"]`);
				if (input_A.disabled || input_B.disabled) {
					return null;
				}
				
				scoreA = input_A.value;
				scoreB = input_B.value;
				if(scoreA == "" || scoreB == "") {
					alert("Please input scores");
					return null;
				}
				
				//AJAX CALL
					
				const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				const url = `/host/tournamentdashboard/updatescore`;
				
				fetch(url, {
					headers: {
						"Content-Type": "application/json",
						"Accept": "application/json, text-plain, */*",
						"X-Requested-With": "XMLHttpRequest",
						"X-CSRF-TOKEN": token
					},
					method: 'post',
					credentials: "same-origin",
					body: JSON.stringify({
						fixture_id: fixture_id,
						a_score: scoreA,
						b_score: scoreB,
					})
				})
				.then(response => response.json())
				.then(data => {
					const tournamentId = document.querySelector('#tournamentIdInfo').value;
					window.location.href = `/host/tournamentdashboard/${tournamentId}`;
				})
				.catch(err => console.log(err));

				input_A.disabled = true;
				input_B.disabled = true;
			})
		})

		//Status color
		const status = document.querySelectorAll('.status-span');

		status.forEach(s => {
			if(s.textContent == "completed") {
				s.classList.add('completed-color')
			} else {
				s.classList.add('scheduled-color')
			}
		})


		//Multi subcategory tournament view
		const tables = document.querySelectorAll('.subcat-div');
		const subcatCard = document.querySelectorAll('.subcat-card-view');	

		subcatCard.forEach(c => {
			c.addEventListener("click", (e) => {
				const subcat = e.target.attributes.getNamedItem('data-subcat').value;
				const viewTournament = document.querySelector(`[data-subcat-div="${subcat}"]`);

				tables.forEach(t => {
					t.classList.add('hide-view');
				})
				subcatCard.forEach(c => {
					c.classList.remove('subcat-card-clicked');
				})

				viewTournament.classList.remove('hide-view');
				c.classList.add('subcat-card-clicked');
			})
		})
		
		document.querySelector('.subcat-card-view').click();
}

</script>