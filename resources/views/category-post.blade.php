@extends('layouts.base')

@section('content')
<h1 class="text-1xl font-bold mb-6">Posts in Category: {{ $category->name ?? 'Unknown Category' }}</h1>

        @if(isset($posts) && count($posts) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <small>{{ $post->category->name ?? 'No Category' }}</small>
                        <h2 class="text-xl font-bold mb-2">{{ $post->title ?? 'No Title' }}</h2>
                        <p class="text-gray-700 mb-4">{{ Str::limit($post->body ?? 'No content available', 100) }}</p>
                        <a href="/posts/{{ $post->id }}" class="text-blue-600 hover:underline">Read More</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-500">No posts available in {{ $category->name ?? 'Unknown' }} category.</p>
            </div>
        @endif
@endsection