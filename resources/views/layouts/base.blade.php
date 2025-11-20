<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-header></x-header>
    <div class="container mx-auto px-4 py-8">
        @yield('content')        
    </div>
    <x-footer></x-footer>
</body>
</html>
