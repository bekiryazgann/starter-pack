<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{assets('css/style.css')}}">
</head>
<body>
@includeIf('layout.alert')
@includeIf('layout.header')

@yield('content')

@includeIf('layout.footer')
</body>
</html>