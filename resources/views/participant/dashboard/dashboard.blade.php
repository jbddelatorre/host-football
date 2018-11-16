@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li class="nav-link" div-link-id="showFindTournaments">Register</li>
					<li class="nav-link" div-link-id="showRegisteredTournaments">View Registered</li>
					<li class="nav-link" div-link-id="showTournamentHistory">Show Ongoing</li>
				</ul>
			</div>
		</div>

		@include('inc.messages')

		<div class="dashboard-view" id="showFindTournaments">
			@include('participant.dashboard.showFindTournaments')
		</div>
		<div class="dashboard-view hide-view" id="showRegisteredTournaments">
			@include('participant.dashboard.showRegisteredTournaments')
		</div>
		<div class="dashboard-view hide-view" id="showTournamentHistory">
			@include('participant.dashboard.showTournamentHistory')
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

	const subcatDom = document.querySelectorAll('.subcat-content');
	subcatDom.forEach((s) => {
		s.textContent = convertSubcategory(s.textContent.trim());
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