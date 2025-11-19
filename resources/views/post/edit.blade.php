<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Post</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Body</label>
                    <textarea id="body" name="body" rows="10"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('body', $post->body) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select id="category_id" name="category_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                    @if($post->featured_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Current image" class="w-32 h-32 object-cover rounded">
                            <p class="text-sm text-gray-500 mt-1">Current image</p>
                        </div>
                    @endif
                    <input type="file" id="featured_image" name="featured_image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image</p>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
