<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Category;
use App\Mail\ConfirmationMail;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->orderBy('updated_at', 'DESC')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::select('id', 'label')->get();
        return view('admin.posts.create', compact('post','categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $post =new Post();

        $post->fill($data);

        $post->slug = Str::slug($post->title, '-');
        $post->user_id = Auth::id();

        if(array_key_exists('image', $data)){
            $image_url = Storage::put('/posts', $data['image']);
            $post->image = $image_url;
        };

        $post->save();

        if(array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);

        $mail = new ConfirmationMail();
        $reciver = Auth::user()->email;
        Mail::to($reciver)->send($mail);

        return redirect()->route('admin.posts.show', $post)->with('message', "Post creato con successo!")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::select('id', 'label')->get();
        $prev_tags = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post','categories','tags', 'prev_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');
        
        if(array_key_exists('switch_author', $data)) $post->user_id = Auth::id();

        if(array_key_exists('image', $data)){
            if($post->image) Storage::delete($post->image);
            $image_url = Storage::put('/posts', $data['image']);
            $post->image = $image_url;
        };
        
        $post->update($data);
        
        if(!array_key_exists('tags', $data)) $post->tags()->detach();
        else $post->tags()->sync($data['tags']);
        
        
        return redirect()->route('admin.posts.show', $post)->with('message', "Post modificato con successo!")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) Storage::delete($post->image);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Il post ?? stato eliminato con successo!')->with('type','warning');
    }
}
