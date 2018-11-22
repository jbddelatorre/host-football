@extends('layouts.app')
<style>
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
@section('content')

	<div class="container">
		<div class="row my-4 px-3">
			<div class="col-sm-3 text-center nav-link" div-link-id="showFindTournaments">
				<p>Find Tournaments</p>
			</div>
			<div class="col-sm-3 text-center nav-link" div-link-id="showRegisteredTournaments">
				<p>Registered Tournament</p>
			</div>
			<div class="col-sm-3 text-center nav-link" div-link-id="showOngoingTournaments">
				<p>Ongoing Tournaments</p>
			</div>
			<div class="col-sm-3 text-center nav-link" div-link-id="showTournamentHistory">
				<p>Tournaments History</p>
			</div>
		</div>

		@include('inc.messages')

		<div class="dashboard-view hide-view animated fadeIn" id="showFindTournaments">
			@include('participant.dashboard.showFindTournaments')
		</div>
		<div class="dashboard-view hide-view animated fadeIn" id="showRegisteredTournaments">
			@include('participant.dashboard.showRegisteredTournaments')
		</div>
		<div class="dashboard-view hide-view animated fadeIn" id="showOngoingTournaments">
			@include('participant.dashboard.showOngoingTournaments')
		</div>
		<div class="dashboard-view hide-view animated fadeIn" id="showTournamentHistory">
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
	
	//Click first view
	document.querySelector('[div-link-id="showFindTournaments"]').click();
}

</script>