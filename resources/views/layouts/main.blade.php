<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jwt spa</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="p-5">
    <div id="app">
        @yield('content')
    </div>
</body>
</html>