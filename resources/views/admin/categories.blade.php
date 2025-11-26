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
        <h1 class="text-2xl font-bold mb-4">Categories</h1>

        @foreach($categories as $category)
            <div class="mb-4 p-4 border rounded bg-white">

                <div class="flex items-center justify-between mb-2">

                    {{-- Category Name (Left) --}}
                    <h2 class="text-sm font-semibold">
                        {{ $category->name }}
                    </h2>

                    {{-- Buttons (Right) --}}
                    <div class="flex space-x-2">
                        {{-- Delete --}}
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                            >
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('categories.edit', $category->id) }}"class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Edit
                        </a>
                    </div>

                </div>

            </div>
        @endforeach

    </main>
</div>
@endsection
