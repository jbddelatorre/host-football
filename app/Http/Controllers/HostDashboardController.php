<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\TournamentSubcategory;
//use Auth;

class HostDashboardController extends Controller
{
    function getTournaments() {
    	$current_id = auth()->user()->id;
    	$tournaments = Tournament::where('user_id', $current_id)->where('status', 1)->get();

    	$tournament_ids = [];

    	foreach($tournaments as $t) {
    		$subcats = [];
    		$subcategory = TournamentSubcategory::where('tournament_id', $t->id)->get();

    		foreach($subcategory as $sc) {
    			array_push($subcats, $sc->subcategory_id);
    		}

    		$tournament_ids[$t->id] = $subcats;
    		//$new_entry = array($t->id => $subcats);
    		//array_push($tournament_ids, $new_entry);
    	}

    	return view('host.dashboard.dashboard', compact('tournaments', 'tournament_ids'));
    }

    function registerTournament(Request $request) {

    	$this->validate($request, [
    		'name' => 'required',
    		'location' => 'required',
    		'startdate' => 'required',
    		'subcategories' => 'required|array|between:1,10',
    		'enddate' => 'required_without:onedaytournament|sometimes|after_or_equal:startdate',
    	],[
    		'name.required' => 'Please enter a tournament name.',
    		'location.required' => 'Please enter a tournament location.',
    		'startdate.required' => 'Please specify tournament date.',
    		'subcategories.required' => 'Please check tournament division.',
    		'enddate.required_without' => 'Please specify tournament duration.',
    		'enddate.after_or_equal' => 'Make sure end date is correct.'
    	]);

    	$tournament = new Tournament;

    	$current_id = auth()->user()->id;

    	$tournament->name = $request->name;
    	$tournament->location = $request->location;
    	$tournament->user_id = $current_id;
    	$tournament->date_start = $request->startdate;

    	if($request->onedaytournament) {
    		$tournament->date_end = $request->startdate;
    	} else {
    		$tournament->date_end = $request->enddate;
    	}

    	$tournament->status = 1;

    	$tournament->save();

    	$tournament_id = $tournament->id;
    	$arr_sub = $request->subcategories;

    	foreach($arr_sub as $sub) {
    		$ts = new TournamentSubcategory;
    		$ts->tournament_id = $tournament_id;
    		$ts->subcategory_id = $sub;
    		$ts->save();
    	}
    	return redirect('/host')->with('success', 'Tournament '.$request->name.' Created!');
    }
}
