<style>
    #landingImage {
        background-image: url({{ URL::asset('img/bg2.jpg')}});
        /*background-size: contain;*/
        width:100%;
        height:95vh;
        position: absolute;
        top:0;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    #opacityDiv {
        height: 95vh;
        width: 100%;
        position: absolute;
        top:0;
        background-color: black;
        opacity: 0.2;
    }

    #landingContainer {
        height: 95vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #landingContent {
        margin-bottom: 180px;
        z-index: 99;
        color:white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #landingContent h1 {
        text-align: center;
        width: 100%;
        border-bottom: 2px solid white;
    }

    #landingContent a {
        width:200px;
    }

    /*Features*/
    .feature-image {
        padding: 0 !important;
    }

    .hover-info {
        position: absolute;
        bottom:0;
        width:100%;
        height:100%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.2s ease-in;
        opacity: 0;
    }

    .hover-info:hover {
        opacity: 1;
        z-index: 99;
    }

    .feat-title {
        border-bottom: solid 2px black;
        width:80%;
        margin:0 auto;
    }

    section {
        padding: 50px 0;
    }

    section h2 {
        margin-top: 16px;
        margin-bottom: 16px;
    }

    #spanHost {
        text-transform: uppercase;
        margin-right: 5px;
    }
    #spanFootball {
        text-transform: uppercase;
        font-weight: 700;
    }

    /*Intro*/
    #intro {
        background-color: #1f0a2e;
        min-height: 25vh;
        color:white;
    }

    #introH4 {
        border-bottom:2px solid white;
        font-size: 32px;
    }

    #intro p {
        font-size: 20px;
    }

    /*Contact*/
    #contact {
        background-image: url({{ URL::asset('img/bg1.jpg')}});
        background-size: 100%;
        background-repeat: no-repeat; 
        opacity: 0.95; 
        height:45vh;
    }

    /*Service*/
    #service h3 {
        margin: 24px; 
    }

    #service p {
        margin: 24px; 
    }

    .client-image {
        width: 130px;
        height: 130px;
    }
</style>

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
                    <a class="btn btn-outline-light" href="{{ route('login') }}">Sign Up</a>
                    <a class="btn btn-outline-light" href="{{ route('register') }}">Log In</a>
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

<script>

    window.onload = () => {
        $(this).scrollTop(0);
        const adjustHeight = () => {
            let distancePX = $(window).scrollTop();
            let windowHeight = $(window).height();
            let distanceVH = 100*distancePX/windowHeight;
            const appNav = document.querySelector('#appNav');
            // console.log(distanceVH);
            if (distanceVH >= 28) {
                appNav.classList.remove('navbar-trans')
            } else {
               appNav.classList.add('navbar-trans')
            }
        }

       $(window).scroll(function(){
          adjustHeight();
        });
    }

</script>