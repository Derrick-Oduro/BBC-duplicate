@extends('layouts.app')

@section('content')
<div class="flex">

    {{-- Sidebar --}}
    <x-sidebar></x-sidebar>
    <main class="w-4/5 p-6">
        <h1 class="text-2xl font-bold mb-4">Posts</h1>
        <div class="mb-4">
            <a href="{{ route('posts.create') }}"
               class="px-3 py-1 bg-black text-white text-sm rounded hover:bg-gray-700 float-right">
               Add Post
            </a>
            <label for="createPostModal"
                class="rounded-md bg-slate-800 py-2 px-4 text-white cursor-pointer ml-2">
                + Add Post
            </label>
            <x-modal.createPostModal :categories="\App\Models\Category::all()"></x-modal.createPostModal>
            {{-- @include('components.modal.createPostModal', ['categories' => \App\Models\Category::all()]) --}}


        </div>

        <table class="min-w-full bg-white rounded ">
            <thead>
                <tr>
                    <th class="py-1 px-3 border-b text-sm">ID</th>
                    <th class="py-1 px-3 border-b text-sm">Title</th>
                    <th class="py-1 px-3 border-b text-sm">Category</th>
                    <th class="py-1 px-3 border-b text-sm">Created At</th>
                    <th class="py-1 px-3 border-b text-sm text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td class="py-1 px-3 border-b text-sm">{{ $post->id }}</td>
                    <td class="py-1 px-3 border-b text-sm">{{ $post->title }}</td>
                    <td class="py-1 px-3 border-b text-sm">{{ $post->category->name ?? 'N/A' }}</td>
                    <td class="py-1 px-3 border-b text-xs">{{ $post->created_at->format('M d, Y') }}</td>
                    <td class="py-1 px-3 border-b">
                        <div class="flex justify-end space-x-2">
                            {{-- @foreach ($posts as $post)

                            @endforeach --}}
                            <label for="editPostModal-{{ $post->id }}"
                               class="px-2 py-1 text-sm text-green-500 rounded hover:underline">
                               Edit
                            </label>


                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you very sure you want to delete this post?')" class="px-2 py-1 text-sm text-orange-500 rounded hover:underline">
                                    Delete
                                </button>
                            </form>
                            <x-modal.editPostModal :post="$post" :categories="\App\Models\Category::all()"></x-modal.editPostModal>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>
</div>
@endsection
