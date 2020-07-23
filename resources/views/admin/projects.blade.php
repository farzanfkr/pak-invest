<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>projects</title>
</head>
<body>
    <table class="table table-striped table-bordered  table-dark table-hover" style="max-width: 100%;margin: auto;">
        <caption style="text-align: center">
            <h3 style="color: #1b1e21">(( اطلاعات پروژه ها ))</h3>
        </caption>
        <thead>
        <td class="text-center">ردیف</td>
        <td class="text-center">عنوان</td>
        <td class="text-center">نام کارفرما</td>
        <td class="text-center">وضعیت</td>
        <td class="text-center">نمایش اطلاعات</td>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td class="text-center">{{ $project -> title }}</td>
                <td class="text-center">{{ $project -> employer_name }}</td>
                <td class="text-center">{{ $project -> status }}</td>
                <td class="text-center"><a href="{{ route('project.show',$project) }}">اطلاعات</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$projects->links()}}
</body>
</html>
