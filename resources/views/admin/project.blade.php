<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>project</title>
</head>
<body>
    <table class="table table-striped table-bordered  table-dark table-hover" style="max-width: 50%;margin: auto;">
        <caption >
            <h3>(( اطلاعات پروژه ))</h3>
        </caption>
        <tbody>
        <tr>
            <td>شناسه:</td>
            <td>{{ $project->id }}</td>
        </tr>
        <tr>
            <td> عنوان: </td>
            <td> {{ $project -> title }} </td>
        </tr>
        <tr>
            <td> نام کارفرما: </td>
            <td> {{ $project -> employer_name }} </td>
        </tr>
        <tr>
            <td> کد ملی کارفرما: </td>
            <td> {{ $project -> employer_national_code }} </td>
        </tr>
        <tr>
            <td> تلفن همراه کارفرما: </td>
            <td> {{ $project -> employer_mobile }} </td>
        </tr>
        </tr>
        <tr>
            <td> آدرس پروژه: </td>
            <td> {{ $project -> address }} </td>
        </tr>
        </tr>
        <tr>
            <td> توضیحات: </td>
            <td> {{ $project -> description }} </td>
        </tr>
        </tr>
        <tr>
            <td> وضعیت: </td>
            <td> {{ $project -> status }} </td>
        </tr>
        </tr>
        <tr>
            <td> برآورد هزینه کورد نیاز برای سرمایه گذاری: </td>
            <td> {{ $project -> investment_cost }} </td>
        </tr>
{{--        <tr>--}}
{{--            <td> نقش: </td>--}}
{{--            @if($user -> role == 1)--}}
{{--                <td> ادمین </td>--}}
{{--            @else--}}
{{--                <td> کاربر عادی </td>--}}
{{--            @endif--}}
{{--        </tr>--}}

        </tbody>
    </table>

{{--        <a href="{{ route('users.edit',$user -> id) }}" class="btn bt-profile" role="button">ویرایش کاربر</a>--}}
{{--        <a href="{{ route('users.games',$user -> id) }}" class="btn bt-profile" role="button">بازی‌های کاربر</a>--}}

</body>
</html>
