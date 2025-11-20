<header class="">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex-1">
            </div>

            <div class="flex-1 text-center">
                <a href="/" class="text-xl font-bold text-gray-800">News Feed</a>
            </div>

            <div class="flex-1 flex justify-end">
                @if(request()->path() == 'admin')
                <button class="bg-black rounded-lg">
                    <a href="/create" class="text-white hover:text-gray-800 mx-2">Create</a>
                </button>
                @endif
            </div>
        </div>
    </nav>

    @if(!request()->is('create'))
    <div class="bg-white border-b">
        <div class="container mx-auto px-1 py-1">
            <div class="flex justify-center space-x-4">
                <a href="/" class="text-xs text-gray-700 hover:text-black font-medium pb-1 border-b-2 transition-colors {{ request()->is('/') ? 'border-red-500 text-black' : 'border-transparent' }}">
                    News
                </a>
                @php
                    $categories = \App\Models\Category::all();
                @endphp

                @foreach($categories as $category)
                    <a href="{{ route('posts.byCategory', ['category' => $category]) }}" class="text-xs text-gray-700 hover:text-black font-medium pb-1 border-b-2 transition-colors 
                        {{ request()->is('posts/category/' . $category->id) ? 'border-red-500 text-black' : 'border-transparent' }}
                        ">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</header>
