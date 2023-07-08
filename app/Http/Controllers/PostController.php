<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //投稿作成のバリデーション
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
         //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
         if($request->hasfile('image_url')) {
                foreach($request->file('image_url') as $file)
                {
                    $image_url = Cloudinary::upload($file->getRealPath())->getSecurePath();
                    $input['image_url'] = $image_url; // each image url is assigned here
                    $post->fill($input)->save(); // a new post is saved for each image
                }
            } else {
                $post->fill($input)->save(); // if no image, save post once
            }
            
            return redirect('/posts');
    }
}

   
        // $input =$request['post'];
        // $input['user_id'] = auth()->id();
        //  //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
        // if($request->file('image_url')){
        //     $image_url = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
        //     $input += ['image_url' => $image_url];
        // }
        // $post->fill($input)->save();
        // return redirect('/posts');