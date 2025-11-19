<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
<x-header></x-header>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        @php
            $categories= \App\Models\Category::all();
        @endphp
        <h1 class="text-1xl font-bold mb-6">Posts in Category: {{ $categories['name'] ?? 'Unknown Category' }}</h1>

        @if(isset($posts) && count($posts) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $post->title ?? 'No Title' }}</h2>
                        <p class="text-gray-700 mb-4">{{ Str::limit($post->body ?? 'No content available', 100) }}</p>
                        <a href="/posts/{{ $post->id }}" class="text-blue-600 hover:underline">Read More</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-500">No posts available in {{ $categories['name'] ?? 'Unknown' }} category.</p>
            </div>
        @endif
    </div>
</body>
<x-footer></x-footer>
</html>
