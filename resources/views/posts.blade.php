<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-header></x-header>
<body class="bg-white">
    <div class="container mx-auto px-4 py-8">
        <div class="card-body p-4">

            @if(isset($posts) && count($posts) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 ">
                    <!-- Featured Post -->
                    <div class="lg:col-span-2">
                        @php $featuredPost = $posts->last(); @endphp
                        <div class="bg-white rounded-lg p-6">
                            <div class="flex gap-5">
                                @if($featuredPost->image)
                                    <div class="flex">
                                        <div class=" lg:w-96 lg:h-64 flex-shrink-0">
                                            <a href="/posts/{{ $featuredPost->id }}">
                                                <img src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover rounded hover:opacity-90 transition-opacity">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="flex-left min-w-0">
                                    <h1 class="text-xl lg:text-2xl font-bold mb-3 leading-tight text-gray-900">
                                        <a href="/posts/{{ $featuredPost->id }}" class="hover:text-blue-600 transition-colors">
                                            {{ $featuredPost->title ?? 'No Title' }}
                                        </a>
                                    </h1>
                                    <p class="text-gray-600 mb-4 text-sm lg:text-base leading-relaxed">{{ Str::limit(strip_tags($featuredPost->body ?? 'No content available'), 200) }}</p>

                                    <div class="flex justify-between items-center text-sm">
                                        <div class="flex items-center space-x-3 text-gray-500">
                                            @if(isset($featuredPost->tag_id))
                                                <span class="text-red-600 font-bold uppercase text-xs">{{ $featuredPost->tag_id }}</span>
                                            @endif
                                            @if(isset($featuredPost->created_at))
                                                <span class="text-xs">{{ $featuredPost->created_at->diffForHumans() }}</span>
                                            @endif
                                        </div>

                                        @if(request()->path() == 'admin')
                                            <div class="flex space-x-2">
                                                <a href="/posts/{{ $featuredPost->id }}/edit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                                    Edit
                                                </a>
                                                <form action="/posts/{{ $featuredPost->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="space-y-5">
                        @foreach($posts->take(-5)->reverse()->skip(1) as $post)
                            <div class="bg-white border-b border-gray-200 p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex gap-2">
                                    @if($post->image)
                                        <div class="w-20 h-20 flex-shrink-0">
                                            <a href="/posts/{{ $post->id }}">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-bold mb-1 leading-tight text-gray-900 line-clamp-2">
                                            <a href="/posts/{{ $post->id }}" class="hover:text-blue-600 transition-colors">
                                                {{ $post->title ?? 'No Title' }}
                                            </a>
                                        </h3>
                                        <p class="text-gray-600 text-xs mb-1 line-clamp-2 leading-normal">{{ Str::limit(strip_tags($post->body ?? 'No content available'), 100) }}</p>

                                        <div class="flex justify-between items-center text-xs">
                                            <div class="flex items-center space-x-2 text-gray-500">
                                                @if(isset($post->tag_id))
                                                    <span class="text-red-600 font-medium uppercase">{{ $post->tag_id }}</span>
                                                @endif
                                                @if(isset($post->created_at))
                                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                                @endif
                                            </div>

                                            @if(request()->path() == 'admin')
                                                <div class="flex space-x-1">
                                                    <a href="/posts/{{ $post->id }}/edit" class="text-blue-600 hover:text-blue-800 text-xs">
                                                        Edit
                                                    </a>
                                                    <form action="/posts/{{ $post->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 text-xs">
                                                            Del
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="-mt-40 relative z-45">
                    <div class="flex space-x-1 pb-0 overflow-x-auto">
                        @foreach($posts->take(9)->reverse()->skip(5) as $post)
                            <div class="bg-white border-gray-200 p-3 hover:bg-gray-50 transition-colors flex-shrink-0 w-40 h-45">
                                @if($post->image)
                                    <div class="w-full h-32 mb-3">
                                        <a href="/posts/{{ $post->id }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover rounded hover:opacity-90 transition-opacity">
                                        </a>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="text-sm font-bold mb-2 leading-tight text-gray-900 line-clamp-2">
                                        <a href="/posts/{{ $post->id }}" class="hover:text-blue-600 transition-colors">
                                            {{ $post->title ?? 'No Title' }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 text-xs mb-2 line-clamp-3 leading-normal">{{ Str::limit(strip_tags($post->body ?? 'No content available'), 100) }}</p>

                                    <div class="flex justify-between items-center text-xs">
                                        <div class="flex items-center space-x-2 text-gray-500">
                                            @if(isset($post->tag_id))
                                                <span class="text-red-600 font-medium uppercase">{{ $post->tag_id }}</span>
                                            @endif
                                            @if(isset($post->created_at))
                                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                            @endif
                                        </div>

                                        @if(request()->path() == 'admin')
                                            <div class="flex space-x-1">
                                                <a href="/posts/{{ $post->id }}/edit" class="text-blue-600 hover:text-blue-800 text-xs">
                                                    Edit
                                                </a>
                                                <form action="/posts/{{ $post->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs">
                                                        Del
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            @else
                <div class="bg-white rounded-lg p-6 text-center">
                    <p class="text-gray-500">No posts available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</body>
<x-footer>
</x-footer>

</html>
