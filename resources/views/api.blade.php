<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Demo</title>
    </head>
    <body>
        <form action="/Search" method="post" enctype="multipart/form-data">
            <h1>API Search:</h1>
            @csrf
            <label for="zipcode1">First ZipCode:</label>
            <input type="text" name="zipcode1" id="zipcode1" value="{{$zipcode1 ?? ''}}"/>
            <label for="zipcode2">Second ZipCode:</label>
            <input type="text" name="zipcode2" id="zipcode2" value="{{$zipcode2 ?? ''}}"/>
            <label for="distance">Max Search Distance:</label>
            <input type="number" name="distance" id="distance" value="{{$distance ?? ''}}"/>
            <input type="submit" value="Search" name="submit" />
        </form>
        <hr />
        @isset($result)
            Do something
        @endisset
    </body>
</html>
