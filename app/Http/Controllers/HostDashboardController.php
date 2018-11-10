<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostDashboardController extends Controller
{
    function getTournaments() {
    	return view('host.dashboard');
    }
}
