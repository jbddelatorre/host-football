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

 		$subcategories = $tournament->subcategories;
 		$group_tables = [];


 		foreach($subcategories as $subcat) {
 			$group_tables = [$subcat->id => array()];

 			$groupA_fixtures = Fixture::where('tournament_id', $id)->where('subcategory_id', $subcat->id)->where('group', "A")->get();
 			$groupB_fixtures = Fixture::where('tournament_id', $id)->where('subcategory_id', $subcat->id)->where('group', "B")->get();

 			$group_tables[$subcat->id]['A'] = array();
 			$group_tables[$subcat->id]['B'] = array();

 			function initializeTable($group, $subcat_id, $group_tables) {
 				$group_teams = Team::where('group', $group)->get();
	 			foreach($group_teams as $team) {
	 				 if (!array_key_exists($team->team_name, $group_tables[$subcat_id][$group])) {
		 				$group_tables[$subcat_id][$group][$team->team_name] = array(
		 					'wins' => 0,
		 					'draw' => 0,
		 					'loss' => 0,
		 					'goal_for' => 0,
		 					'goal_against' => 0,
		 					'goal_difference' => 0,
		 					'points' => 0,
		 				);
		 			}
	 			}
	 			return $group_tables;
 			}
 			$group_tables = initializeTable("A", $subcat->id, $group_tables);
 			$group_tables = initializeTable("B", $subcat->id, $group_tables);

 			function generateTable($group_tables, $tournament_id, $subcategory_id) {
 				$fixtures = Fixture::where('tournament_id', $tournament_id)->where('subcategory_id', $subcategory_id)->get();
 			
 				foreach($fixtures as $match) {
 					
 				}
 			}

 			generateTable($group_tables, $id, $subcat->id);
 		}

 		dd($group_tables);

    	return view('host.tournament-dashboard.dashboard', compact('tournament', 'team_info'));
    }
}
