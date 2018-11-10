<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantDashboardController extends Controller
{
    function getTournaments() {
    	return view('participant.dashboard');
    }
}
