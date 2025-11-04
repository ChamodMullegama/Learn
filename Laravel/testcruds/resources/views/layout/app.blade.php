<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('lib.css')
</head>
<body>
    @include('pages.components.nav')
    @yield('con')
    @include('lib.js')
</body>
</html>
