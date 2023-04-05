<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Localization</title>
    <style>
        form{
            display: inline;
        }
    </style>
</head>
<body>
<div class="container">
    @include('localization::includes.messages')

    <h1>Edit settings</h1>
    @foreach($settings as $setting)
        <div>
            <form method="post" action="{{route('setting.update' , $setting->id)}}">
                @method('PUT')
                @csrf
                <label>{{$setting->key}} : </label>
                <input name="values" type="text" placeholder="values" value="{{$setting->values}}">
                <input type="submit" value="submit">
            </form>
        </div>
    @endforeach
</div>
</body>
</html>
