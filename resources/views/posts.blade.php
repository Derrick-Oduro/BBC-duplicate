@extends('layouts.base')
@section('content')
<div class="max-w-7xl mx-auto p-1">

    @if(isset($posts) && count($posts) > 0)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 min-h-[700px]">

            {{-- LEFT MAIN COLUMN --}}
            <div class="col-span-1 md:col-span-9">

                <div class="relative bg-white overflow-hidden mb-4" style="height: 320px;">
                    @foreach($posts->take(3) as $index => $post)
                        <input type="radio" name="carousel" id="slide{{ $index }}" class="hidden peer/slide{{ $index }}" {{ $index === 0 ? 'checked' : '' }}>
                    @endforeach

                    @foreach($posts->take(3) as $index => $featuredPost)
                        <div class="absolute inset-0 opacity-0 transition-opacity duration-500 peer-checked/slide{{ $index }}:opacity-100">
                            <div class="grid grid-cols-1 md:grid-cols-3 h-full">
                                <div class="flex flex-col justify-center p-6 md:p-8">
                                    <h1 class="text-xl md:text-3xl font-bold mb-4 leading-tight text-gray-800">
                                        <a href="/posts/{{ $featuredPost->id }}" class="hover:underline">
                                            {{ $featuredPost->title ?? 'No Title' }}
                                        </a>
                                    </h1>
                                    <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                        {{ Str::limit(strip_tags($featuredPost->body ?? 'No content available'), 200) }}
                                    </p>
                                </div>
                                <div class="col-span-2 relative overflow-hidden">
                                    @if($featuredPost->image)
                                        <img src="{{ asset('storage/' . $featuredPost->image) }}"
                                             class="w-full h-80 object-cover"
                                             alt="{{ $featuredPost->title }}">
                                    @else
                                        <div class="w-full h-80 bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500">No Image</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
                        @foreach($posts->take(3) as $index => $post)
                            <label for="slide{{ $index }}" class="w-3 h-3 rounded-full border-2 border-white transition-all duration-200 cursor-pointer bg-white/50 peer-checked/slide{{ $index }}:bg-white"></label>
                        @endforeach
                    </div>
                </div>

                {{-- Bottom Grid --}}
                <div class="hidden md:grid md:grid-cols-4 gap-3">
                    @foreach($posts->skip(4)->take(4) as $post)
                        <div class="bg-white overflow-hidden">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-32 object-cover" alt="{{ $post->title }}">
                            @endif
                            <div class="p-0">
                                <h5 class="text-base font-bold mb-2 mt-2 text-gray-800">
                                    <a href="/posts/{{ $post->id }}" class="hover:underline">{{ $post->title }}</a>
                                </h5>
                                <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($post->body ?? 'No content available'), 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT COLUMN --}}
            <div class="col-span-1 md:col-span-3 flex flex-col gap-2">
                @foreach($posts->skip(3)->take(3) as $index => $post)
                    <div class="bg-white overflow-hidden flex-1">
                            @if($post->image && $post->id == $secondLatest->id)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-32 object-cover" alt="{{ $post->title }}">
                            @endif
                        <div class="p-3">
                            <h5 class="text-base font-bold mb-3 text-gray-800">
                                <a href="/posts/{{ $post->id }}" class="hover:underline">{{ $post->title }}</a>
                            </h5>
                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($post->body ?? 'No content available'), 100) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            @php
                $morePosts = $posts->skip(8)->take(5);
            @endphp
            @if($morePosts->count() > 0)
                <div class="col-span-1 md:col-span-12 flex flex-row gap-3 -mt-4">
                    @foreach($morePosts as $post)
                        <div class="bg-white p-4">
                            <h5 class="text-base font-bold text-gray-800">
                                <a href="/posts/{{ $post->id }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h5>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <div class="bg-white rounded-lg p-6 text-center">
            <p class="text-gray-500">No posts available at the moment.</p>
        </div>
    @endif

    <div class="border-2 border-black"></div>
    <div class="">
        <h4>MORE TO EXPLORE</h4>
    </div>

    @if(isset($posts) && count($posts) > 0)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 min-h-[200px]">
            {{-- LEFT MAIN COLUMN --}}
            <div class="col-span-1 md:col-span-9">
                @php $featuredPostMore = $posts->skip(13)->first(); @endphp
                @if($featuredPostMore)
                    {{-- Featured Post --}}
                    <div class="bg-white overflow-hidden h-64 md:h-auto mb-4">
                        <div class="grid grid-cols-2 md:grid-cols-2 h-full">
                            <div class="flex flex-col justify-center p-6 md:p-8 order-2 md:order-1">
                                <h1 class="text-xl md:text-3xl lg:text-3xl font-bold font-sty mb-4 leading-tight text-gray-800">
                                    <a href="/posts/{{ $featuredPostMore->id }}" class="hover:underline">
                                        {{ $featuredPostMore->title ?? 'No Title' }}
                                    </a>
                                </h1>
                                <p class="text-sm md:text-base lg:text-sm text-gray-600 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($featuredPostMore->body ?? 'No content available'), 200) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection
