<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('admin.editpost', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
    public function create()
    {
        return view('admin.addpost');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:2080', // Max 20MB
        ]);
    
        $post = new Post;
        $post->seller_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->price = $request->price;
    
        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $mediaName = time().'.'.$media->getClientOriginalExtension();
            $mediaType = $media->getClientMimeType();
            
            if (in_array($media->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                $media->storeAs('public/images', $mediaName);
            } else {
                $media->storeAs('public/videos', $mediaName);
            }
    
            $post->media = $mediaName;
            $post->media_type = $mediaType;
        }
    
        $post->save();
    
        return redirect()->route('posts.create')->with('success', 'Post created successfully.');
    }
    

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric|min:0',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    //     ]);

    //     $post = new Post;
    //     $post->title = $request->title;
    //     $post->description = $request->description;
    //     $post->price = $request->price;

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $image->storeAs('public/images', $imageName);
    //         $post->image = $imageName;
    //     }

    //     $post->save();

    //     return redirect()->route('posts.create')->with('success', 'Post created successfully.');
    // }

    public function showContactForm()
    {
        return view('admin.contact');
    }

    
}
