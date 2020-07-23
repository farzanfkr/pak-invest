<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>edit user</title>
</head>
<body>
<form action="{{route('user.update',$user)}}" method="post">
    @csrf
    {{method_field('put')}}

    <label for="name">name</label>
    <input type="text" id="name" class="@error('name') is-invalid @enderror" name="name" value="{{ $user -> name }}" required autofocus>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="username">username</label>
    <input type="text" id="username" class="@error('username') is-invalid @enderror" name="username" value="{{ $user -> username }}" required autofocus>
    @error('username')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="email">email</label>
    <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $user -> email }}" required autofocus>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="mobile">mobile</label>
    <input type="text" id="mobile" class="@error('mobile') is-invalid @enderror" value="{{ $user -> mobile }}" name="mobile" required autofocus>
    @error('mobile')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="national-code">national code</label>
    <input type="text" id="national-code" class="@error('national-code') is-invalid @enderror" value="{{ $user -> national_code }}" name="national_code" required autofocus>
    @error('national-code')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

{{--    <label for="password">password</label>--}}
{{--    <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" required autofocus>--}}
{{--    @error('password')--}}
{{--    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--    @enderror--}}

{{--    <label for="password-confirm">password confirm</label>--}}
{{--    <input type="password" id="password-confirm" class="@error('password-confirm') is-invalid @enderror" name="password_confirmation" required autofocus>--}}

    <button type="submit"> submit </button>
</form>
</body>
</html>

