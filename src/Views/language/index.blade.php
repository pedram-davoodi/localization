<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{___('Localization')}}</title>
    <style>
        form{
            display: inline;
        }
        li,input{
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="container">

    @include('localization::includes.messages')
    <hr>

    <h1>{{___('langLists')}}</h1>
    <ul>
        @foreach($langs as $lang)
            <li data-lang="{{$lang->lang}}" >
                <a href="{{route('language.edit' , $lang->id)}}">{{$lang->name}}</a>
                <form action="{{route('language.destroy' , $lang->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" value="{{___('delete')}}">{{___('delete')}}</button>
                </form>
            </li>
        @endforeach
    </ul>

    <hr>

    <h1>{{___('createLang')}}</h1>
    <form method="post" action="{{route('language.store')}}">
        @csrf
        <input name="name" type="text" placeholder="{{___('name')}}">
        <input name="lang" type="text" placeholder="{{___('lang')}}">
        <input type="submit" value="{{___('submit')}}">
    </form>
</div>
</body>
</html>
