<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>edit project</title>
</head>
<body>
<form action="{{route('project.update',$project)}}" method="post">
    @csrf
    {{method_field('put')}}

    <label for="title">title</label>
    <input type="text" id="title" class="@error('title') is-invalid @enderror" name="title" value="{{ $project -> title}}" required autofocus>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="employer_name">employer name</label>
    <input type="text" id="employer_name" class="@error('employer_name') is-invalid @enderror" name="employer_name" value="{{ $project -> employer_name }}" required autofocus>
    @error('employer_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="address">address</label>
    <input type="text" id="address" class="@error('address') is-invalid @enderror" name="address" value="{{ $project -> address}}" required autofocus>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="employer_mobile">employer mobile</label>
    <input type="text" id="employer_mobile" class="@error('employer_mobile') is-invalid @enderror" value="{{ $project -> employer_mobile }}" name="employer_mobile" required autofocus>
    @error('employer_mobile')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="employer_national_code">employer national code</label>
    <input type="text" id="employer_national_code" class="@error('employer_national_code') is-invalid @enderror" value="{{ $project -> employer_national_code }}" name="employer_national_code" required autofocus>
    @error('employer_national_code')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="description">description</label>
    <input type="text" id="description" class="@error('description') is-invalid @enderror" name="description"  value="{{$project -> description}}" required autofocus>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="investment_cost">investment cost</label>
    <input type="text" id="investment_cost" class="@error('investment_cost') is-invalid @enderror" name="investment_cost" value="{{$project -> investment_cost}}" required autofocus>
    @error('investment_cost')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit"> submit </button>
</form>
</body>
</html>
