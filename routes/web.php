<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'host'], function() {
	Route::get('/host', 'HostDashboardController@getTournaments');
	Route::post('/host/registertournament', 'HostDashboardController@registerTournament');

	Route::get('/host/edittournament/{id}', 'HostDashboardController@editTournament');
	Route::post('/host/submitedittournament/{id}', 'HostDashboardController@submitEditTournament');

	Route::delete('/host/deletetournament/{id}', 'HostDashboardController@deleteTournament');

	Route::post('/host/updateteamstatus/{team_id}', 'HostDashboardController@updateTeamStatus');

	Route::get('/host/viewregistration/{id}/{subcat_id}', 'HostDashboardController@viewTeamRegistration');
	
	Route::get('/host/initialize/{id}', 'HostDashboardController@initializeTournament');

	Route::get('/host/tournamentdashboard/{id}', 'HostTournamentDashboardController@getTournamentFixtures');
	Route::post('/host/tournamentdashboard/updatescore', 'HostTournamentDashboardController@updateScore');

	Route::post('/host/tournamentdashboard/complete/{id}', 'HostTournamentDashboardController@completeTournament');

	Route::get('/host/tournamentdashboard/gethistory/{id}', 'HostTournamentDashboardController@getHistory');
});

Route::group(['middleware' => 'participant'], function() {
	Route::get('/participant', 'ParticipantDashboardController@getTournaments');
	Route::get('/participant/registration/{id}', 'ParticipantDashboardController@registrationPage');
	Route::post('/participant/registration/{id}', 'ParticipantDashboardController@registerTeam');

	Route::get('/participant/viewregistration/{id}', 'ParticipantDashboardController@viewRegistration');
	Route::get('/participant/editregistration/{team_id}', 'ParticipantDashboardController@editRegistration');
	Route::delete('/participant/deleteteam/{team_id}', 'ParticipantDashboardController@deleteTeam');

	Route::get('/participant/tournamentdashboard/{id}', 'ParticipantDashboardController@viewOngoing');
	Route::get('/participant/gethistory/{id}', 'ParticipantDashboardController@getHistory');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/notfound', function() {
	return view('error.error');
});
