<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Demo</title>
    </head>
    <body>
        <form action="/Api" method="post" enctype="multipart/form-data">
            <a href="/" style="float:right">Go Back</a>
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
            <p>{{$result->message ?? ''}}</p>
            @if($result->distance == -1)
                <p>No Results</p>
            @else
                <p>Distance: {{$result->distance}}</p>
                <p>
                    {{$result->zipcode1->zip_code}} * {{$result->zipcode1->city}} *
                    {{$result->zipcode1->state}} * {{$result->zipcode1->lat}} *
                    {{$result->zipcode1->lng}}
                </p>
                <p>
                    {{$result->zipcode2->zip_code}} * {{$result->zipcode2->city}} *
                    {{$result->zipcode2->state}} * {{$result->zipcode2->lat}} *
                    {{$result->zipcode2->lng}}
                </p>
            @endif
        @endisset
    </body>
</html>
