<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tags;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $secondLatest = $posts->skip(1)->first();
        return view('posts', [
            'posts' => $posts,
            'secondLatest' => $secondLatest
        ]);

    }

    public function admin()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tags::all();
        return view('post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();
        $imagePath = "";
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create the post
        Post::create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'image' => $imagePath,
            'category_id' => $validatedData['category_id'],
            'tag_id' => $validatedData['tag_id'],
        ]);

        return redirect()->route('posts.admin')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('singlepost', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $categories = Category::all();
        $tags = Tags::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin')->with('success', 'Post deleted successfully!');
    }

    public function postsByCategory(Category $category)
    {
        $posts = Post::with('category')
        ->where('category_id', $category->id)
        ->get();
        return view('category-post', compact('posts'));
    }
}
