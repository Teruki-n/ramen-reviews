<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Cloudinary;


class PostController extends Controller
{

    public function index(Request $request, Post $post)
    {   
        //検索対応
        $search = $request->input('search');

        $query = Post::query();
    
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
    
        $posts = $query->orderBy('updated_at', 'DESC')->paginate(7);
    
        return view('posts.index', compact('posts'));

    }
    
    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request, Post $post)
    {
        //validation
        $validatedData = $request->validate([
            'post.taste'=>['required'],
            'post.kind'=>['required'],
            'post.pref'=>['required'],
            'post.rating'=>['required'],
            'post.comment'=>['min:20','max:1000'],
            'image_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $input =$request['post'];
        $input['user_id'] = auth()->id();
        
        $input['image_url'] = []; // Initialize the image_url field as an array
        
        if($request->hasfile('image_url')) {
            foreach($request->file('image_url') as $file)
            {
                $image_url = Cloudinary::upload($file->getRealPath())->getSecurePath();
                array_push($input['image_url'], $image_url); // Add the image url to the image_url field
            }
        }
        
        $post->fill($input)->save(); // Save the post once, regardless of the number of images
        
        return redirect('/posts');
    }
    
}

   
