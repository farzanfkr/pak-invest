<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>user</title>
</head>
<body>

<table class="table table-striped table-bordered  table-dark table-hover" style="max-width: 50%;margin: auto;">
    <caption >
        <h3>(( اطلاعات کاربر ))</h3>
    </caption>
    <tbody>
    <tr>
        <td>شناسه:</td>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <td> نام: </td>
        <td> {{ $user -> name }} </td>
    </tr>
    <tr>
        <td> نام کاربری: </td>
        <td> {{ $user -> username }} </td>
    </tr>
    <tr>
        <td> کد ملی : </td>
        <td> {{ $user -> national_code }} </td>
    </tr>
    <tr>
        <td> تلفن همراه : </td>
        <td> {{ $user -> mobile }} </td>
    </tr>

    <tr>
        <td> ایمیل: </td>
        <td> {{ $user -> email }} </td>
    </tr>
    <tr>
        <td> وضعیت: </td>
        @if($user -> active == 1)
            <td> فعال </td>
        @else
            <td> غیر فعال </td>
        @endif
    </tr>
{{--    <tr>--}}
{{--        <td> وضعیت: </td>--}}
{{--        <td> {{ $project -> description }} </td>--}}
{{--    </tr>--}}

{{--    <tr>--}}
{{--        <td> نقش: </td>--}}
{{--        <td> {{ $user -> status }} </td>--}}
{{--    </tr>--}}
{{--    </tr>--}}

    <tr>
        <td> نقش: </td>
        @if($user -> role == "admin")
            <td> ادمین </td>
        @else
            <td> سرمایه‌دار </td>
        @endif
    </tr>

    </tbody>
</table>

{{--        <a href="{{ route('users.edit',$user -> id) }}" class="btn bt-profile" role="button">ویرایش کاربر</a>--}}
{{--        <a href="{{ route('users.games',$user -> id) }}" class="btn bt-profile" role="button">بازی‌های کاربر</a>--}}

</body>
</html>
