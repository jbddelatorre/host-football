<style>
    .circle-button:hover {
        cursor:pointer;
        transform: translateY(-2px);
        transition: all .2s linear;
    }

    .disable-circle-button {
    	opacity: 0.3;
    	color:gray !important;
    }
    .disable-circle-button:hover {
    	transform: translateY(0) !important;
    }
	
	.nav-link {
		transition: all 0.5s ease-in;
	}

	.nav-link:hover {
		cursor: pointer;
		background-color: #8dc26f73;
		color: #000; 
		letter-spacing: 2px;
	}
	.nav-link p {
		margin-bottom: 0;
	}

	.nav-link {
		border:1px solid #8DC26F;
		padding: 24px 0;
		font-size: 16px;
		display: flex;
		align-items: center;
	}

	.active-nav-link {
		background-color: #8DC26F !important;
		color:#eee;
		font-weight: 400;
		letter-spacing: 1px;
	}

</style>

@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row my-4 px-3">
			<div class="col-sm-3 text-center nav-link" div-link-id="showRegisteredTournaments">
				<p>My Tournaments</p>
			</div>
			<div class="col-sm-3 text-center nav-link" div-link-id="registerTournament">
				<p>Register New Tournament</p>
			</div>
			<div class="col-sm-3 text-center nav-link" div-link-id="showOngoingTournaments">
				<p>Ongoing Tournaments</p>
			</div>
			<div class="col-sm-3 text-center nav-link" div-link-id="showTournamentsHistory">
				<p>Tournaments History</p>
			</div>
		</div>

		@include('inc.messages')

		@foreach($tournaments as $t)
			{{-- modal --}}
			<div class="modal fade" id="deleteT{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document" style="transform:translateY(50%);">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        Are you sure you want to delete this tournament?
			      </div>
			      <div class="modal-footer">
					<form action="/host/deletetournament/{{$t->id}}" method="POST">
						@csrf
						@method('DELETE')
				        <button type="submit" class="btn btn-outline-danger">Delete</button>
					</form>
			      </div>
			    </div>
			  </div>
			</div>
		{{-- end modal --}}
		@endforeach

		<div class="animated fadeIn dashboard-view hide-view" id="showRegisteredTournaments">
			@include('host.dashboard.showRegisteredTournaments')
		</div>
		<div class="animated fadeIn dashboard-view hide-view" id="registerTournament">
			@include('host.dashboard.registerTournament')
		</div>
		<div class="animated fadeIn dashboard-view hide-view" id="showOngoingTournaments">
			@include('host.dashboard.showOngoingTournaments')
		</div>
		<div class="animated fadeIn dashboard-view hide-view" id="showTournamentsHistory">
			@include('host.dashboard.showTournamentsHistory')
		</div>
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

	const subcatDom = document.querySelectorAll('div.subcat-content');
	subcatDom.forEach((s) => {
		s.textContent = convertSubcategory(s.textContent.trim());
	})

	
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


	// View Navigation Functionality

	const tabs = document.querySelectorAll('.nav-link');
	const views = document.querySelectorAll('.dashboard-view');

	tabs.forEach(t => {
		t.addEventListener("click", () => {

			const link_id = t.getAttribute('div-link-id')
			const current_view = document.querySelector(`#${link_id}`)

			views.forEach(v => {
				v.classList.add('hide-view');
			})
			current_view.classList.remove('hide-view');

			messageAnimate();
		})
	})



	// Show Registered Tournaments View Script Functionalities
	scriptShowRegisteredTournaments();

	//Navlink bg change

	const navLink = document.querySelectorAll('.nav-link');

	navLink.forEach(n => {
		n.addEventListener("click" , () => {
			navLink.forEach(nv => {
				nv.classList.remove("active-nav-link")
			})
			n.classList.add('active-nav-link')
		})
	})

	//Click first
	document.querySelector('[div-link-id="showRegisteredTournaments"]').click();
}

</script>

