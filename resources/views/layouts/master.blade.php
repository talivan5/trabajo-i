<!DOCTYPE html>
<html lang= "{{ str_replace('_','-', app()->getlocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf=token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="css/app.css">
        <!--<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@2.6.0/assets/css/leaflet.css">-->
        <link rel="stylesheet" href="css/geosearch.css">
        <!--<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@2.6.0/assets/css/leaflet.css">-->
        <title>IT4SC - @yield('title')</title>

        <link  href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            @yield('content')
        </div>

        <script>src="/js/app.js"</script>
    </body>
</html>