<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex,nofollow">
    <meta name="google" content="notranslate">
    <link rel="dns-prefetch" href="{{ request()->getSchemeAndHttpHost() }}">
    <link rel="preconnect" href="{{ request()->getSchemeAndHttpHost() }}">
    <link rel="prefetch" href="{{ request()->getSchemeAndHttpHost() }}">
    <link rel="prerender" href="{{ request()->getSchemeAndHttpHost() }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Warehouse management</title>

    @vite('resources/css/app.css')

    @livewireStyles
    
</head>

<body>

    @wireUiScripts
    
    @livewireScripts
</body>

</html>
