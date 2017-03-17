@extends ('layouts.auth')
@section('title')
Login
@endsection
@section ('content')
<div class="login">
    <h1>User Login</h1>
    {{Form::open(['url'=>'/login'])}}
    <form accept-charset="UTF-8" action="http://bunong.dev:81/users/login" method="POST">
        <div class="input text">
            <input type="text" id="username" value="{{ old('username') }}" autofocus="autofocus" name="username" required="required" placeholder="Enter your username">
            @if ($errors->has('username'))
                <span class="form-msg">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="input password">
            <input type="password" id="password" value="" name="password" required="required" placeholder="Enter your password">
            @if ($errors->has('password'))
                <span class="form-msg">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="input submit">
            {{Form::submit('Login')}}
        </div>
    {{Form::close()}}
</div>
@endsection