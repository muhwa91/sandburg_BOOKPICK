<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js')}}" defer></script>
</head>
<body>
    <div id="app">
        <div>            
            <Header-Component></Header-Component>
            <App-Component></App-Component>
            <Footer-Component></Footer-Component>
        </div>
    </div>
</body>
</html>