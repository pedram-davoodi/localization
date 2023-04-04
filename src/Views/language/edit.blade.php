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

    <hr>

    <h1>Edit Lang</h1>

    <div>
        <form method="post" action="{{route('language.update' , $lang->id)}}">
            @method('PUT')
            @csrf
            <input name="name" type="text" placeholder="name" value="{{$lang->name}}">
            <input name="lang" type="text" placeholder="lang" value="{{$lang->lang}}">
            <input type="submit" value="submit">
        </form>
    </div>
    <hr>

    <h1>Edit Phrase</h1>
    @foreach($phrases as $phrase)
        <div>
            <form method="post" action="{{route('phrase.update' , $phrase->id)}}">
                @method('PUT')
                @csrf
                <input name="item" type="text" placeholder="item" value="{{$phrase->item}}">
                <input name="value" type="text" placeholder="value" value="{{$phrase->value}}">
                <input type="submit" value="submit">
            </form>

            <form action="{{route('phrase.destroy' , $phrase->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach

    <hr>
    <h1>Create phrase</h1>
    <div>
        <form method="post" action="{{route('phrase.store')}}">
            @csrf
            <input name="item" type="text" placeholder="item" value="">
            <input name="value" type="text" placeholder="value" value="">
            <input name="lang" type="hidden" placeholder="lang" value="{{$lang->lang}}">
            <input type="submit" value="submit">
        </form>
    </div>
</div>
</body>
</html>
