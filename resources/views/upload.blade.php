<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Demo</title>
    </head>
    <body>
        <form action="/Upload" method="post" enctype="multipart/form-data">
            @csrf
            <label for="file">Select image to upload:</label>
            <input type="file" name="file" id="file" accept=".csv" />
            <input type="submit" value="Upload" name="submit" />
        </form>
    </body>
</html>
