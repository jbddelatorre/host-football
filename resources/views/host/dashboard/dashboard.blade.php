@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li class="nav-link" div-link-id="showRegisteredTournaments">View Registered</li>
					<li class="nav-link" div-link-id="registerTournament">Register</li>
					<li class="nav-link" div-link-id="showOngoingTournaments">Show Ongoing</li>
					<li class="nav-link" div-link-id="showTournamentsHistory">Tournament History</li>
				</ul>
			</div>
		</div>

		@include('inc.messages')

		<div class="dashboard-view" id="showRegisteredTournaments">
			@include('host.dashboard.showRegisteredTournaments')
		</div>
		<div class="dashboard-view hide-view" id="registerTournament">
			@include('host.dashboard.registerTournament')
		</div>
		<div class="dashboard-view hide-view" id="showOngoingTournaments">
			@include('host.dashboard.showOngoingTournaments')
		</div>
		<div class="dashboard-view hide-view" id="showTournamentsHistory">
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
			current_view.classList.remove('hide-view')
		})
	})
}

</script>

