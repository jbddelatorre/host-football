@extends('layouts.app')
<link rel="stylesheet" href="{{asset('/css/register.css')}}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="form animated fadeInDown">
{{--                 <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body"> --}}
                    <form method="POST" class="login-form" action="{{ route('register') }}">
                        @csrf

 {{--                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
{{--                             </div>
                        </div> --}}
{{-- 
                        <div class="form-group row">
                            <label for="organization" class="col-md-4 col-form-label text-md-right">{{ __('Organization') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="organization" type="text" class="form-control{{ $errors->has('organization') ? ' is-invalid' : '' }}" name="organization" value="{{ old('organization') }}" required autofocus placeholder="Organization">

                                @if ($errors->has('organization'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif
{{--                             </div>
                        </div> --}}

{{--                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
{{--                             </div>
                        </div> --}}

{{--                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
{{--                             </div>
                        </div> --}}

{{--                         <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
{{--                             </div>
                        </div> --}}
                        
                            <div class="my-4">
                            <span style="margin-right: 24px;">{{ __('Choose User Type') }}</span>
                    
                                <input id="beHost" class="mr-2" type="radio" name="user_type_id" checked value="1" />
                                <label class="mr-4" for="beHost"><span></span>Be a Host</label>

                                <input id="bePart" class="mr-2" type="radio" name="user_type_id" value="2" />
                                <label class="radio-inline mr-4" for="bePart"><span></span>Join a Tournament</label>
                            </div>


{{--                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4"> --}}
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
{{--                             </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>