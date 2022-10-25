<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        // dd($request);
        // upload the image
        $image = $request->image->store('posts');
        // create the post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,

        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        // flash message
        session()->flash('success', 'Post created successfully');
        // redirect user 
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'published_at', 'content']); // only will give us only the fields we specified. 
        // This is for security purposes to prevent us from us collecting harmful fields passed in by hackers

        // check if request obj has new image 
        if ($request->hasFile('image')) {

            // upload it
            $image = $request->image->store('posts');

            // delete old one
            $post->deleteImage();

            $data['image'] = $image;
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags); //The sync method is a helpful method for Many to Many relationships. 
            // It will detach old tags that were previously selected but not seleceted during the update and 
            // attach new tags that were selected to the posts
        }

        // update attributes

        $post->update($data);

        // flash message

        session()->flash('success', 'Post updated successfully');

        // redirect user
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //because route-model binding fails here, we use the normal find method to get the post
        // FirstOrFail is used for security reasons, 
        // this throws an exception if it doesn't find the record and show a 404 page.
        // The where clause is a query builder.

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            // Delete image related to post from storage.
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully');
        // redirect user 
        return redirect()->route('post.index');
    }
    /**
     * Display a list of trashed posts.
     
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        // redirect user 
        return view('posts.index')->with('posts', $trashed);
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully');

        return redirect()->back();
    }
}