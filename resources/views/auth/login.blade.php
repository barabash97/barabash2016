@extends('layouts.auth')

@section('content')
<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>VLADICMS</strong> Login</h1>
                    <div class="description">
                        <p>

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login</h3>
                            <p>Inserisci le credenziali di accesso:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="{{ url('/login') }}" method="post" class="login-form">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="sr-only" for="form-username">E-mail</label>
                                <input type="text" name="email" placeholder="E-mail..." class="form-username form-control" id="form-username" value="{{ old('email') }}">
                                @if ($errors->has('email'))

                                <strong>{{ $errors->first('email') }}</strong>

                                @endif
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                @if ($errors->has('password'))

                                <strong>@if ($errors->has('password'))

                                    <strong>{{ $errors->first('password') }}</strong></br>

                                    @endif</strong></br>

                                @endif
                            </div>
                            <button type="submit" class="btn">Login!</button>
                        </form>
                        <a href='/register'>Non sei registrato?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@section('title')
Login
@stop