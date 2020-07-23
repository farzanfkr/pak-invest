<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>users</title>
</head>
<body>
<table class="table table-striped table-bordered  table-dark table-hover" style="max-width: 100%;margin: auto;">
    <caption style="text-align: center">
        <h3 style="color: #1b1e21">(( اطلاعات کاربران ))</h3>
    </caption>
    <thead>
    <td class="text-center">ردیف</td>
    <td class="text-center">نام</td>
    <td class="text-center">نام کاربری</td>
    <td class="text-center">نقش</td>
    <td class="text-center">نمایش اطلاعات</td>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{ $loop->index + 1 }}</td>
            <td class="text-center">{{ $user -> name }}</td>
            <td class="text-center">{{ $user -> username }}</td>
            <td class="text-center">{{ $user -> role }}</td>
            <td class="text-center"><a href="{{ route('user.show',$user) }}">اطلاعات</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$users->links()}}
</body>
</html>
