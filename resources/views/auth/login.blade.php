<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="username" >username</label>
        <input id="username" type="text" class="form-control{{ $errors -> has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}">
        @if($errors -> has('username'))
            <strong style="color:red;">{{ $errors -> first('username') }}</strong>
        @endif

        <label for="password" >password</label>
        <input id="password" type="password" class="form-control{{ $errors -> has('password') ? ' is-invalid' : '' }}" name="password">
        @if($errors -> has('password'))
            <strong style="color:red;">{{ $errors -> first('password') }}</strong>
        @endif

        <button type="submit">login</button>


        {{--<a href="{{ route('password.request') }}">
            {{ __('فراموشی رمز عبور؟') }}
        </a>--}}
        <p>آیا حساب کاربری دارید؟<a href="{{route('register')}}">ایجاد حساب</a></p>
    </form>
</body>
</html>
