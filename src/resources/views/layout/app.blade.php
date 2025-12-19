<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お買い物アプリ</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitaize.css') }}">
    @yield('css')

</head>
<body>
    <div class="header">
        <div class="header-title">
        <h1 ><a class="header-title__top" href="/">お買い物アプリ</a></h1>
        </div>
    </div>
    <main>
        @yield('content')
    </main>

    
</body>
</html>