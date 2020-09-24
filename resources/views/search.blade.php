<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Demo</title>
    </head>
    <body>
        <form action="/Search" method="post" enctype="multipart/form-data">
            @csrf
            <label for="zipcode">ZipCode:</label>
            <input type="text" name="zipcode" id="zipcode" value="{{$zipcode ?? ''}}"/>
            <label for="city">City:</label>
            <input type="text" name="city" id="city" value="{{$city ?? ''}}"/>
            <label for="state">State:</label>
            <select name="state" id="state">
                    <option value=""></option>
                @foreach ($states as $s)
                    <option value="{{$s->StateCode}}" {{$state == $s->StateCode ? "selected" : "" }}>{{$s->StateCode}}</option>
                @endforeach
            </select>
            <input type="submit" value="Search" name="submit" />
        </form>
        <hr />
        @isset($results)
            @forelse ($results as $r)
                <p>{{$r->ZipCode}} * {{$r->MixedCity}} * {{$r->StateCode}} * {{$r->Latitude}} * {{$r->Longitude}}</p>
            @empty
                <p>No Results!</p>
            @endforelse
        @endisset
    </body>
</html>
