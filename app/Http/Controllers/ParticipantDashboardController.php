<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Tournament;
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
                //dd($team);

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
        //dd($registeredTeams);

    	return view('participant.dashboard.dashboard', compact('tournaments', 'findTournament_ids', 'my_tournaments', 'myTournament_ids', 'registeredTeams'));
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
            dd('asdasdasdasdas');
            $current_id = auth()->user()->id;
            $team = new Team;
            $team->user_id = $current_id;
            $team->tournament_id = $request->tournamentId;
            $team->subcategory_id = $request->subcategory;
            $team->team_name = $request->teamname;
            $team->coach_name = $request->coachname;
            $team->mobile_number = $request->coachmobile;
            $team->save();

            $team_id = $team->id;

            foreach($request->players as $p) {
                $player = new Player;
                $player->team_id = $team_id;
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

            return redirect('/participant');
        } else {
            $team = Team::find($request->teamId);
            $team->subcategory_id = $request->subcategory;
            $team->team_name = $request->teamname;
            $team->coach_name = $request->coachname;
            $team->mobile_number = $request->coachmobile;
            $team->save();

            $old_players = Player::where('team_id', $request->teamId);
            $old_players->delete();

            foreach($request->players as $p) {
                $player = new Player;
                $player->team_id = $request->teamId;
                $player->name = $p['name'];
                $player->date_of_birth = $p['dob'];
                $player->save();
            }

            return redirect('/participant/viewregistration/'.$request->tournamentId)->with('success', "Successfully edited team!");;
        }
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

}
