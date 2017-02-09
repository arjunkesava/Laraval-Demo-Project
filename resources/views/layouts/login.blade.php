@extends('layouts.master')
@section('title', 'Welcome Login')
@yield('header')
@section('content')
    <br/><br/><br/>
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a>
                </div>
            </div>
            <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" method="post" action="{{ url('/checkuser') }}">
                    {{ csrf_field() }}
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="email" class="form-control" name="username"
                               value="{{ old('username') }}" placeholder="username or email" required>
                    </div>
                    @if ($errors->has('username'))
                        <div class="alert alert-warning">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password"
                               placeholder="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-warning">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    Select an Option
                    <select id="login-user-type" name="usertype" class="form-control" required
                            selected="{{ old('usertype') }}">
                        <option></option>
                        <option value="teacher" @if (old('usertype') == 'teacher') selected="selected" @endif>Teacher
                        </option>
                        <option value="student" @if (old('usertype') == 'student') selected="selected" @endif>Student
                        </option>
                        <option value="principal" @if (old('usertype') == 'principal') selected="selected" @endif>
                            Principal
                        </option>
                    </select>
                    <br/>
                    @if ($errors->has('usertype'))
                        <div class="alert alert-warning">
                            {{ $errors->first('usertype') }}
                        </div>
                    @endif
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <input id="btn-login" href="#" class="btn btn-success" type="submit" value="Login">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Don't have an account!
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
