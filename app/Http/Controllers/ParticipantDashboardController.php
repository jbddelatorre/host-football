<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\ParticipantTournament;
use App\TournamentSubcategory;
use App\Team;
use App\Players;

class ParticipantDashboardController extends Controller
{
    function getTournaments() {
    	$current_id = auth()->user()->id;

    	$tournaments = Tournament::where('status', 1)->where('user_id', '!=', $current_id)->get();

    	$my_tournaments = Tournament::where('status', 1)->where('user_id', $current_id)->get();

    	function getSubcats($tournaments) {
    		$tournament_ids = [];

    		foreach($tournaments as $t) {
	    		$subcats = [];
	    		$subcategory = TournamentSubcategory::where('tournament_id', $t->id)->get();

	    		foreach($subcategory as $sc) {
	    			array_push($subcats, $sc->subcategory_id);
	    		}

	    		$tournament_ids[$t->id] = $subcats;
	    	}
	    	return $tournament_ids;
    	}

    	$findTournament_ids = getSubcats($tournaments);
    	$myTournament_ids = getSubcats($my_tournaments);

    	return view('participant.dashboard.dashboard', compact('tournaments', 'findTournament_ids', 'my_tournaments', 'myTournament_ids'));
    }

    function registrationPage($id) {
    	$tournament = Tournament::find($id);
    	$subcats = TournamentSubcategory::where('tournament_id', $id)->get();
    	return view('participant.registration.registration', compact('tournament', 'subcats', 'id'));
    }


    function registerTeam(Request $request) {
    	$this->validate($request, [
    		'tournamentId' => 'required',
    		'subcategory' => 'required',
    		'teamname' => 'required|string',
    		'coachname' => 'required|string',
    		//'coachmobile' => 'required|regex:/(09)[0-9]{9}/',
    		'coachmobile' => 'required',
    		'players' => 'required|array|between:8,12',
    		'players.*.name' => 'required|string',
    		'players.*.dob' => 'required|date',
    	],[
    		'tournamentId.required' => 'Please select a tournament.',
    		'subcategory.required' => 'Please a division to enter.',
    		'teamname.required' => 'Please enter a team name.',
    		'coachname.required' => 'Please enter name of coach.',
    		'coachmobile.required' => 'Please enter contact details of coach.',
    		'players.between' => 'Each team must have 8 - 12 registered players.',
    		'players.*.name.required' => 'Player name is required.',
    		'players.*.dob.required' => "Player date of birth is required.",
    	]);

    	$current_id = auth()->user()->id;

    	$subcatId = TournamentSubcategory::where('tournament_id', $request->tournamentId)->where('subcategory_id', $request->subcategory)->get()[0]->id;

    	$team = new Team;
    	$team->user_id = $current_id;
    	$team->tournament_subcategory_id = $subcatId;
    	$team->team_name = $request->teamname;
    	$team->coach_name = $request->coachname;
    	//dd($request->coachmobile);
    	$team->mobile_number = $request->coachmobile;

    	$team->save();

    	$count_tournament = ParticipantTournament::where('user_id', $current_id)->get()->count();

    	if ($count_tournament == 0) {
    		$tour = new ParticipantTournament;
    		$tour->name = 'PARTICIPANT';
    		$tour->location = 'PARTICIPANT';
    		$tour->user_id = $current_id;
    		$tour->date_start = null;
    		$tour->date_end = null;
    		$tour->save();
    	}


    	return redirect('/participant');
    }

}
