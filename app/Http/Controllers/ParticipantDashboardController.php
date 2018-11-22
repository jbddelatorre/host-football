<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Tournament;
use App\Fixture;
use App\ParticipantTournament;
use App\TournamentSubcategory;
use App\Team;
use App\Player;

class ParticipantDashboardController extends Controller
{
    function getTournaments() {
    	$current_id = auth()->user()->id;

    	$tournaments = Tournament::where('status', 1)->where('user_id', '!=', $current_id)->get();

        $my_tournaments = Tournament::where('status', 1)->whereHas('users', function($u) {
            $current_id = auth()->user()->id;
            $u->where('user_id', '=', $current_id);
        })->get();

        $ongoing = Tournament::where('status', 2)->whereHas('users', function($u) {
            $current_id = auth()->user()->id;
            $u->where('user_id', '=', $current_id);
        })->get();

        $history = Tournament::where('status', 3)->whereHas('users', function($u) {
            $current_id = auth()->user()->id;
            $u->where('user_id', '=', $current_id);
        })->get();

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

        function getTeams($tournaments) {
            $myTeams = [];

            foreach($tournaments as $t) {
                $teams = [];
                $current_id = auth()->user()->id;
                $team = Team::where('user_id', $current_id)->where('tournament_id', $t->id)->get();

                foreach($team as $at) {
                    array_push($teams, ['teamname' => $at->team_name,'data' => $at->subcategory_id]);
                }
                
                $myTeams[$t->id] = $teams;
            }
            return $myTeams;
        }
        $findTournament_ids = getSubcats($tournaments);
        $myTournament_ids = getSubcats($my_tournaments);
        $registeredTeams = getTeams($my_tournaments);

    	return view('participant.dashboard.dashboard', compact('tournaments', 'findTournament_ids', 'my_tournaments', 'myTournament_ids', 'registeredTeams', 'ongoing', 'history'));
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

        if ($request->teamId == null) {
            $current_id = auth()->user()->id;
            $team = new Team;
            $team->user_id = $current_id;
            $team->tournament_id = $request->tournamentId;
            $team->subcategory_id = $request->subcategory;
            $team->team_name = $request->teamname;
            $team->coach_name = $request->coachname;
            $team->mobile_number = $request->coachmobile;
            $team->team_registration_status = "P";
            $team->save();

            $team_id = $team->id;

            foreach($request->players as $p) {
                $player = new Player;
                $player->team_id = $team_id;
                $player->tournament_id = $request->tournamentId;
                $player->name = $p['name'];
                $player->date_of_birth = $p['dob'];
                $player->save();
            }

            $count_tournament = ParticipantTournament::where('user_id', $current_id)->where('tournament_id', $request->tournamentId)->get()->count();

            if ($count_tournament == 0) {
                $tour = new ParticipantTournament;
                $tour->tournament_id = $request->tournamentId;
                $tour->user_id = $current_id;
                $tour->save();
            }

            return redirect('/participant')->with('success', "Successfully registered team!");

        } else {
            $team = Team::find($request->teamId);
            $team->subcategory_id = $request->subcategory;
            $team->team_name = $request->teamname;
            $team->coach_name = $request->coachname;
            $team->mobile_number = $request->coachmobile;
            $team->save();

            $old_players = Player::where('team_id', $request->teamId);
            $old_players->delete();

            $players = Player::where('team_id', $request->teamId);
            $players->delete();

            foreach($request->players as $p) {
                $player = new Player;
                $player->team_id = $request->teamId;
                $player->tournament_id = $request->tournamentId;
                $player->name = $p['name'];
                $player->date_of_birth = $p['dob'];
                $player->save();
            }

            return redirect('/participant')->with('success', "Successfully edited team!");
        }
    }

    function editTeamRegistration(Request $request) {
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
    }


    function viewRegistration($id) {
        $current_id = auth()->user()->id;
        $tournament = Tournament::find($id);
        $teams = Team::where('user_id', $current_id)->where('tournament_id', $id)->get();
        $organization = Auth::user()->organization;
        return view('participant.registration.viewregistration', compact('teams', 'organization', 'tournament'));
    }

    function editRegistration($team_id) {
        $team = Team::find($team_id);
        $players = Player::where('team_id', $team_id)->get();
        $tournament = Tournament::find($team->tournament_id);

        return view('participant.registration.editregistration', compact('team','players', 'tournament'));
    }

    function deleteTeam(Request $request, $team_id) {
        $team = Team::find($team_id);
        $players = Player::where('team_id', $team_id);

        $team->delete();
        $players->delete();

        return redirect('/participant/viewregistration/'.$request->tournamentId)->with('success', "Successfully deleted team!");
    }

    function viewOngoing($id) {
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

        return view('participant.tournament-dashboard.dashboard', compact('tournament', 'team_info', 'group_tables'));
    }

    function getHistory($id) {
        return redirect()->back()->with('error', "Sorry, feature is not yet available.");
    }
}
