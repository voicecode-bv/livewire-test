<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locale" content="{{ app()->getLocale() }}">
    @livewireStyles
</head>

<body>
    <div>
        @if(app()->getLocale() == 'en')
        <a href="/nl/favorieten">Switch to Dutch</a>
        @else
        <a href="/favorites">Switch to English</a>
        @endif
        <br><br>
    </div>

    <livewire:tests.test-component />
    @livewireScripts
</body>
</html>