<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body>
<div id="app">
    <url-shortener-form/>
</div>
    <script type="module" src="{{ asset('build/assets/url-shortner.js') }}"></script>
</body>
</html>