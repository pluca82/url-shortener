<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Other head elements -->
</head>
<body>
    <div id="app">
        <HelloWorld/>
    </div>
    <a href="{{ asset('build/js/app.js') }}">Test Link</a>
    <!-- Include the compiled JavaScript -->
    <script type="module" src="{{ asset('build/js/app.js') }}"></script>
</body>
</html>