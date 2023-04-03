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
    <h1>Create Lang</h1>
    @include('localization::includes.messages')
    <form method="post" action="{{route('language.store')}}">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="lang" type="text" placeholder="lang">
        <input type="submit" value="submit">
    </form>
</div>
</body>
</html>
