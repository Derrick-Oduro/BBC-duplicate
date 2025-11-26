@extends('layouts.app')

@section('content')
<div class="flex">

    <x-sidebar></x-sidebar>
    <main class="w-3/4 p-6">
        <h1 class="text-2xl font-bold mb-4">Tags</h1>
        <div class="mb-4">
            <a href="{{ route('tag.create') }}"
               class="px-3 py-1 bg-black text-white text-sm rounded hover:bg-gray-700 float-right">
               Add Tag
            </a>
        </div>

        <table class="min-w-full bg-white rounded ">
            <thead>
                <tr>
                    <th class="py-1 px-3 border-b text-sm">ID</th>
                    <th class="py-1 px-3 border-b text-sm">Name</th>
                    <th class="py-1 px-3 border-b text-sm">Slug</th>
                    <th class="py-1 px-3 border-b text-sm text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td class="py-1 px-3 border-b text-sm">{{ $tag->id }}</td>
                    <td class="py-1 px-3 border-b text-sm">{{ $tag->name }}</td>
                    <td class="py-1 px-3 border-b text-sm">{{ $tag->slug ?? 'N/A' }}</td>
                    <td class="py-1 px-3 border-b">
                        <div class="flex justify-end space-x-2">

                            <a href="{{ route('tags.edit', $tag->id) }}"
                               class="px-2 py-1 text-sm text-green-500 rounded hover:underline">
                               Edit
                            </a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="px-2 py-1 text-sm text-orange-500 rounded hover:underline">
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
