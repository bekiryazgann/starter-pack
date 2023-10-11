<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{assets('css/style.css')}}">
</head>
<body class="h-screen">
@includeIf('admin.layout.alert')
<main class="flex items-start">
    @includeIf('admin.layout.aside')
    <div class="w-[calc(100vw-300px)] ml-[300px]">
        @includeIf('admin.layout.header')
        <div class="fixed top-[90px] left-[300px] right-0 bottom-0 max-h-[calc(100vh-90px)] z-10">
            <div class="overflow-y-auto max-h-[calc(100vh-90px)] p-8">
                @yield('content')
            </div>
        </div>
    </div>
</main>
<script src="{{assets('js/admin/app.js')}}"></script>
</body>
</html>