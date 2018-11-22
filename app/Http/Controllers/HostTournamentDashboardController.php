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

	 	function initializeTable($group, $subcat_id, $group_tables, $id, $subcat) {
			$group_teams = Team::where('tournament_id', $id)->where('subcategory_id', $subcat)->where('group', $group)->get();
			foreach($group_teams as $team) {
				if (!array_key_exists($team->id, $group_tables[$subcat_id][$group])) {
	 				$group_tables[$subcat_id][$group][$team->id] = array(
	 					'played' => 0,
	 					'wins' => 0,
	 					'draws' => 0,
	 					'losses' => 0,
	 					'goals_for' => 0,
	 					'goals_against' => 0,
	 					'goal_difference' => 0,
	 					'points' => 0,
	 				);
 				}
			}
			return $group_tables;
		}

		function createScore($winner, $winnerscore, $loser, $loserscore, $groups, $g) {

			if($winnerscore == $loserscore) {
				$groups[$g][$winner]['played'] = $groups[$g][$winner]['played'] + 1;
				$groups[$g][$loser]['played'] = $groups[$g][$loser]['played'] + 1;
				$groups[$g][$winner]['draws'] = $groups[$g][$winner]['draws'] + 1; 
				$groups[$g][$loser]['draws'] = $groups[$g][$loser]['draws'] + 1; 

				$groups[$g][$winner]['goals_for'] = $groups[$g][$winner]['goals_for'] + $winnerscore;
				$groups[$g][$winner]['goals_against'] = $groups[$g][$winner]['goals_against'] + $loserscore;
				$groups[$g][$loser]['goals_for'] = $groups[$g][$loser]['goals_for'] + $loserscore;
				$groups[$g][$loser]['goals_against'] = $groups[$g][$loser]['goals_against'] + $winnerscore;

				$groups[$g][$winner]['goal_difference'] = $groups[$g][$winner]['goals_for'] - $groups[$g][$winner]['goals_against'];
				$groups[$g][$loser]['goal_difference'] = $groups[$g][$loser]['goals_for'] - $groups[$g][$loser]['goals_against'];

				$groups[$g][$winner]['points'] = 3*$groups[$g][$winner]['wins'] + $groups[$g][$winner]['draws'];
				$groups[$g][$loser]['points'] = 3*$groups[$g][$loser]['wins'] + $groups[$g][$loser]['draws']; 

				return $groups;
			}

			//WINNER
			$groups[$g][$winner]['played'] = $groups[$g][$winner]['played'] + 1;  
			$groups[$g][$winner]['wins'] = $groups[$g][$winner]['wins'] + 1;
			$groups[$g][$winner]['goals_for'] = $groups[$g][$winner]['goals_for'] + $winnerscore;
			$groups[$g][$winner]['goals_against'] = $groups[$g][$winner]['goals_against'] + $loserscore;

			$groups[$g][$winner]['goal_difference'] = $groups[$g][$winner]['goals_for'] - $groups[$g][$winner]['goals_against'];
			$groups[$g][$winner]['points'] = 3*$groups[$g][$winner]['wins'] + $groups[$g][$winner]['draws']; 

			//LOSER
			$groups[$g][$loser]['played'] = $groups[$g][$loser]['played'] + 1;
			$groups[$g][$loser]['losses'] = $groups[$g][$loser]['losses'] + 1;
			$groups[$g][$loser]['goals_for'] = $groups[$g][$loser]['goals_for'] + $loserscore;
			$groups[$g][$loser]['goals_against'] = $groups[$g][$loser]['goals_against'] + $winnerscore; 

			$groups[$g][$loser]['goal_difference'] = $groups[$g][$loser]['goals_for'] - $groups[$g][$loser]['goals_against'];
			$groups[$g][$loser]['points'] = 3*$groups[$g][$loser]['wins'] + $groups[$g][$loser]['draws'];  

			return $groups;
		}

		function generateTable($group_tables, $tournament_id, $subcategory_id) {
			$fixtures = Fixture::where('tournament_id', $tournament_id)->where('subcategory_id', $subcategory_id)->get();
			
			foreach($fixtures as $f) {
				$a = $f->a_score;
				$b = $f->b_score;
				$at = $f->a_team;
				$bt = $f->b_team;
				$g = $f->group;

				if($a > $b) {

					//dd($group_tables["MO"]);
					$group_tables[$subcategory_id] = createScore($at, $a, $bt, $b, $group_tables[$subcategory_id], $g);
					//dd('winn');
				}
				if($a < $b) {
					$group_tables[$subcategory_id] = createScore($bt, $b, $at, $a, $group_tables[$subcategory_id], $g);
				}
				if($a == $b && $a != null && $b != null) {
					$group_tables[$subcategory_id] = createScore($at, $a, $bt, $b, $group_tables[$subcategory_id], $g);
				}
			}
			return $group_tables;
		}

 		foreach($subcategories as $subcat) {
 			$group_tables[$subcat->id] = array();

 			$groupA_fixtures = Fixture::where('tournament_id', $id)->where('subcategory_id', $subcat->id)->where('group', "A")->get();
 			$groupB_fixtures = Fixture::where('tournament_id', $id)->where('subcategory_id', $subcat->id)->where('group', "B")->get();

 			$group_tables[$subcat->id]['A'] = array();
 			$group_tables[$subcat->id]['B'] = array();

 			$group_tables = initializeTable("A", $subcat->id, $group_tables, $id, $subcat->id);
 			$group_tables = initializeTable("B", $subcat->id, $group_tables, $id, $subcat->id);
 			$group_tables = generateTable($group_tables, $id, $subcat->id);
 		}

    	return view('host.tournament-dashboard.dashboard', compact('tournament', 'team_info', 'group_tables'));
    }


    function updateScore(Request $request) {
    	$fixture = Fixture::find($request->fixture_id);
    	$fixture->a_score = $request->a_score;
    	$fixture->b_score = $request->b_score;
    	$fixture->fixture_status_id = "C";
    	$fixture->save();
    	return response()->json();
    }

    function completeTournament($id) {
    	$tournament = Tournament::find($id);

    	$fixtures = Fixture::where('tournament_id', $id)->get();

    	foreach($fixtures as $f) {
    		if($f->fixture_status_id == "S") {
    			return redirect('/host/tournamentdashboard/'.$id)->with('error', "All fixtures must be played.");
    		}
    	}
    	$tournament->status = 3;
    	$tournament->save();

    	return redirect('/host')->with('success', 'Successfully completed tournament!');
    }


    function getHistory($id) {
    	return redirect('/host')->with('error', 'Sorry, feature is not yet available.');
    }
}
