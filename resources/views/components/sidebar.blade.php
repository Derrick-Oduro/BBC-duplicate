<aside class="w-1/5 bg-gray-100 min-h-screen p-4">
        <nav class="space-y-4">
            <a href="{{ route('posts.admin') }}"class="{{ request()->is('admin/posts') ? 'bg-white' : 'bg-gray-100' }} block px-4 py-2 rounded hover:bg-white">Posts</a>
            <a href="{{ route('categories.index') }}"class="{{ request()->is('categories') ? 'bg-white' : 'bg-gray-100' }} block px-4 py-2 rounded hover:bg-white">Categories</a>
            <a href="{{ route('tags.index') }}"class="{{ request()->is('tags') ? 'bg-white' : 'bg-gray-100' }} block px-4 py-2 rounded hover:bg-white">Tags</a>
            <a href="{{ route('subscribers.index') }}"class="{{ request()->is('subscribers') ? 'bg-white' : 'bg-gray-100' }} block px-4 py-2 rounded hover:bg-white">Subscribers</a>
        </nav>
</aside>
