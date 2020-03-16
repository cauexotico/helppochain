<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('blockchains.store') }}">
            @csrf
            <input type="text" name="version" value="1.0.0" required placeholder="Version (1.0.0)">
            <input type="number" min="1" max="8" name="difficulty" placeholder="Difficulty">
            <select name="type">
                <option value="solo">Solo</option>
                <option value="shared">Shared</option>
            </select>
            <input type="submit">
        </form>

    </body>
</html>
