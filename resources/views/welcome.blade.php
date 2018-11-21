<style>
    #landingImage {
        background-image: url({{ URL::asset('img/bg2.jpg')}});
        background-size: contain;
        width:100%;
        height:100vh;
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

    #landingContent button {
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

</style>

@extends('layouts.app')

@section('landing')
    <div id="landingImage">
        <div id="opacityDiv">
        </div>
    </div>
    <div id="landingContainer">
        <div id="landingContent" class="wow slideInUp">
            <h1><span id="spanHost">Host</span><span id="spanFootball">Football</span></h1>
            <h3>Host a Tournament | Join a Tournament</h3>
            <div id="landingButtonDiv">
                <button class="btn btn-outline-light">Sign Up</button>
                <button class="btn btn-outline-light">Log In</button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section id="features">
        <div class="container">
            <h2>Features</h2>
            <div class="row align-items-center wow slideInLeft">
                <div class="col-sm-5 text-center">
                    <h3>Host a Tournament</h3>
                    <p>Hosting a tournament has never been easier.</p>
                </div>
                <div class="col-sm-7 feature-image">
                    <img src="{{asset('img/host-feat.jpg')}}" alt="host feature" style="width:100%;">
                    <div class="hover-info">
                        <img src="{{asset('img/host-feat-2.jpg')}}" alt="host feature" style="width:100%;">
                    </div>
                </div>
            </div>
            <div class="row align-items-center wow slideInRight">
                <div id="participantFeatureImage" class="col-sm-7 feature-image">
                    <img src="{{asset('img/part-feat.jpg')}}" alt="host feature" style="width:100%;">
                    <div class="hover-info">
                        <img src="{{asset('img/part-feat-2.jpg')}}" alt="host feature" style="width:100%;">
                    </div>
                </div>
                <div class="col-sm-5 text-center">
                    <h3>Join a Tournament</h3>
                    <p>Register and join tournaments.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="service">
        <div class="container">
            <h2>service</h2>
            <div class="row">
                
            </div>
        </div>
    </section>

    <section id="clients">
        <div class="container">
            <h2>clients</h2>
            <div class="row">
                
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2>contact</h2>
            <div class="row">
                
            </div>
        </div>
    </section>

@endsection