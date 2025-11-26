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
    <main class="w-3/4 p-6">
        <h1 class="text-2xl font-bold mb-4">Posts</h1>
        <div class="mb-4">
            <a href="{{ route('posts.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
               Add Post
            </a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $post->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->category->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->created_at->format('M d, Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-end space-x-2">

                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                               Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>
</div>
@endsection
