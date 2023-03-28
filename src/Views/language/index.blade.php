<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Localization</title>
</head>
<body>
<div class="container">
    <h1>Lang lists</h1>
    <ul>
        @foreach($langs as $lang)
            <li data-lang="{{$lang->lang}}"><a href="{{route('language.show' , $lang->id)}}">{{$lang->name}}</a></li>
        @endforeach
    </ul>
</div>
</body>
</html>
