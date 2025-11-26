@extends('layouts.app')

@section('content')
<div class="flex">

    {{-- Sidebar --}}
    <x-sidebar></x-sidebar>

    {{-- Main Content Area --}}
    <main class="w-3/4 p-6">
        <h1 class="text-2xl font-bold mb-4">Categories</h1>
        <div class="mb-4">
            <a href="{{ route('category.create') }}"
               class="px-3 py-1 bg-black text-white text-sm rounded hover:bg-gray-700 float-right">
               Add Category
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
                @foreach($categories as $category)
                <tr>
                    <td class="py-1 px-3 border-b text-sm">{{ $category->id }}</td>
                    <td class="py-1 px-3 border-b text-sm">{{ $category->name }}</td>
                    <td class="py-1 px-3 border-b text-sm">{{ $category->slug ?? 'N/A' }}</td>
                    <td class="py-1 px-3 border-b">
                        <div class="flex justify-end space-x-2">

                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="px-2 py-1 text-sm text-green-500 rounded hover:underline">
                               Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
