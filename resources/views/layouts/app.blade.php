<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiss TPH Barcode Scanner</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css"/>
</head>
<body class="font-sans antialiased text-black bg-grey-lighter">
<div id="app" class="pb-10">
    <header class="w-full bg-white shadow mb-10">
        <div class="container flex py-4">
            @if(Auth::user()->is_admin)
                <ul class="flex list-reset">
                    <li><a href="{{route('home')}}" class="text-black no-underline mr-2">Scanner</a></li>
                    <li><a href="{{route('users.index')}}" class="text-black no-underline">Users</a></li>
                </ul>
            @endif
            <form method="POST" action="{{route('logout')}}" class="ml-auto">
                @csrf
                <button type="submit">Logout <span class="hidden md:inline">({{Auth::user()->name}})</span></button>
            </form>
        </div>
    </header>
    @yield('content')
</div>

<script src="//webrtc.github.io/adapter/adapter-latest.js" type="text/javascript"></script>
<script src="/js/app.js?v3" type="text/javascript"></script>
</body>
</html>
