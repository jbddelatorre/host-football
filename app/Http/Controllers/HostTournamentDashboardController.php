<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Team;
use App\Player;
use App\Fixture;
use App\TournamentSubcategory;
use App\ParticipantTournament;

class HostTournamentDashboardController extends Controller
{
    function getTournamentFixtures($id) {
    	$tournament = Tournament::find($id);
 		$teams = Team::where('tournament_id', $id)->get();
 		$team_info = [];

 		foreach($teams as $t) {
 			$team_info[$t->id] = ['team_name' => $t->team_name, 'organization' => $t->user->organization];
 		}

    	return view('host.tournament-dashboard.dashboard', compact('tournament', 'team_info'));
    }
}
