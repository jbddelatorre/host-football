<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\TournamentSubcategory;

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
    	return view('participant.registration.registration', compact('tournament', 'subcats'));
    }
}
