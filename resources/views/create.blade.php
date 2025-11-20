<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
<x-header>
</x-header>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Create a New Post</h2>
            <form action="/posts" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
                    <select id="category_id" name="category_id" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="tag_id" class="block text-gray-700 font-semibold mb-2">Tags</label>
                    <select id="tag_id" name="tag_id" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Select a tag</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-semibold mb-2">Image(Optional)</label>
                    <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-500 text-sm mt-1">JPG, PNG, GIF</p>
                </div>

                <div>
                    <label for="body" class="block text-gray-700 font-semibold mb-2">Body</label>
                    <textarea id="body" name="body" rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-black text-white font-semibold px-6 py-3 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>
<x-footer>
</x-footer>
</html>
