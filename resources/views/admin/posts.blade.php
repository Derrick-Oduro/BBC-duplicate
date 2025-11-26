@extends('layouts.app')

@section('content')
<div class="flex">

    {{-- Sidebar --}}
    <aside class="w-1/4 bg-blue-600 min-h-screen p-4">
        <nav class="space-y-4">
            <a href="{{ route('posts.admin') }}" class="block px-4 py-2 bg-white rounded hover:bg-gray-300">Posts</a>
            <a href="{{ route('categories.index') }}" class="block px-4 py-2 bg-white rounded hover:bg-gray-300">Categories</a>
            <a href="{{ route('tags.index') }}" class="block px-4 py-2 bg-white rounded hover:bg-gray-300">Tags</a>
        </nav>
    </aside>

    {{-- Main Content Area --}}
    <main class="w-3/4 p-6">
        <h1 class="text-2xl font-bold mb-4">Posts</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $post->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->category_id }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </main>
</div>
@endsection
