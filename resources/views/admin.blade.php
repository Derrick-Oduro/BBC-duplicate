<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-header></x-header>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="card-body p-4">

            @if(isset($posts) && count($posts) > 0)
                <div class="space-y-4">
                    @foreach($posts as $post)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $post->title ?? 'No Title' }}</h3>
                            <div>
                            <img src="{{ isset($post->image) ? asset('images/' . $post->image) : 'https://via.placeholder.com/150' }}" alt="Post Image" class="w-full h-auto mb-4">
                            </div>
                            <p class="text-gray-700 mb-3">{{ $post->content ?? $post->body ?? 'No content available' }}</p>


                            <div class="flex justify-between items-center text-sm text-gray-500">
                                @if(isset($post->tag_id))
                                    <span>#{{ $post->tag_id }}</span>
                                @endif
                                @if(isset($post->created_at))
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-500">No posts available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</body>
<x-footer>
</x-footer>

</html>
