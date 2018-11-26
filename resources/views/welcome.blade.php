@extends('layouts.appWelcome')

@section('landing')
    <div id="landingImage">
        <div id="opacityDiv">
        </div>
    </div>
    <div id="landingContainer">
        <div id="landingContent" class="wow slideInUp">
            <h1><span id="spanHost">Host</span><span id="spanFootball">Football</span></h1>
            <h4>Host a Tournament &middot; Join a Tournament</h4>
            @guest
                <div id="landingButtonDiv">
                    <a class="btn btn-outline-light" href="{{ route('register') }}">Sign Up</a>
                    <a class="btn btn-outline-light" href="{{ route('login') }}">Log In</a>
                </div>
            @else
            @endguest
        </div>
    </div>
@endsection

@section('content')
    <section id="intro">
        <div class="container wow slideInRight" style="height:20vh; display: flex; justify-content: center;">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-12 text-center">
                    <h4 id="introH4">Start using HostFootball for your next tournament.</h4>
                    <p>Host Football is a web platform for football organizers to manage their tournaments</p>
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <div class="container">
{{--             <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Features</h2>
                </div>
            </div> --}}
            <div id="featHost"class="row align-items-center wow fadeIn">
                <div class="col-sm-5 text-center">
                    <h3 class="feat-title">Host a Tournament</h3>
                    <p>Hosting a tournament has never been easier</p>
                    <div class="feat-list">
                        <ul>
                            <li>Set-up and register a tournament.</li>
                            <li>8 Teams per division from Under-10 to Men's Open.</li>
                            <li>Easily accept and reject team registrations.</li>
                            <li>Auto-generate fixtures for each division</li>
                            <li>Keep track of fixture results.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 feature-image">
                    <img src="{{asset('img/host-feat.jpg')}}" alt="host feature" style="width:100%;">
                    <div class="hover-info">
                        <img src="{{asset('img/host-feat-2.jpg')}}" alt="host feature" style="width:100%;">
                    </div>
                </div>
            </div>
            <div id="featPart"class="row align-items-center wow fadeIn">
                <div id="participantFeatureImage" class="col-sm-7 feature-image">
                    <img src="{{asset('img/part-feat.jpg')}}" alt="host feature" style="width:100%;">
                    <div class="hover-info">
                        <img src="{{asset('img/part-feat-2.jpg')}}" alt="host feature" style="width:100%;">
                    </div>
                </div>
                <div class="col-sm-5 text-center">
                    <h3 class="feat-title">Join a Tournament</h3>
                    <p>Register and join tournaments.</p>
                    <div class="feat-list">
                        <ul>
                            <li>Find and view available tournaments</li>
                            <li>Register your teams and players</li>
                            <li>Be informed of your registration status</li>
                            <li>Be updated with fixture results during the tournament</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr style="margin:8px 48px;">

    <section id="service">
        <div class="container">
{{--             <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Services</h2>
                </div>
            </div> --}}
            <div class="row text-center">
                <div class="col-sm-1">
                    {{-- margin left --}}
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4 wow slideInDown">
                            <h3>Save time</h3>
                            <img src="{{asset('img/alarm-clock.png')}}" alt="" style="width:30%;">
                            <p>Save time and effort from registration to tournament day.</p>
                        </div>
                        <div class="col-sm-4 wow slideInDown">
                            <h3>Quick and Easy</h3>
                            <img src="{{asset('img/running.png')}}" alt="" style="width:30%;">
                            <p>No need to manually tally scores, Host Football can do it for you.</p>
                        </div>
                        <div class="col-sm-4 wow slideInDown">
                            <h3>Be more efficient</h3>
                            <img src="{{asset('img/production.png')}}" alt="" style="width:30%;">
                            <p>Make the most of your time and let us handle organization.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                {{-- Margin Right --}}
                </div>
            </div>
        </div>
    </section>

    <hr style="margin:8px 48px;">

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Our Valued Clients</h2>
                    <p>*Disclaimer - Sample data only</p>
                </div>
            </div>
            <div class="row my-2 wow fadeInUpBig">
                <div class="col-sm-3 text-center my-4">
                    <img class="client-image" src="{{asset('img/client1.png')}}" alt="">
                </div>
                <div class="col-sm-3 text-center my-4">
                    <img class="client-image" src="{{asset('img/client2.png')}}" alt="">
                </div>
                <div class="col-sm-3 text-center my-4">
                    <img class="client-image" src="{{asset('img/client3.png')}}" alt="">
                </div>
                <div class="col-sm-3 text-center my-4">
                    <img class="client-image" src="{{asset('img/client4.png')}}" alt="">
                </div>
                <div class="col-sm-3 text-center my-4">
                    <img class="client-image" src="{{asset('img/client5.png')}}" alt="">
                </div>
                <div class="col-sm-3 text-center my-4">
                    <img class="client-image" src="{{asset('img/client6.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-7"></div>
                <div class="col-sm-5 wow slideInUp">
                    <div class="form-group">
                        <h3 style="color:white;">Contact Host Football</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <textarea rows="5" class="form-control">Message</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
