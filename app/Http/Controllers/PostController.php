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
    
        $posts = $query->orderBy('updated_at', 'DESC')->paginate(5);
    
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
            'post.comment'=>['min:20'],
        ]);
        
        $input =$request['post'];
        $input['user_id'] = auth()->id();
         //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
        if($request->file('image_url')){
            $image_url = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $post->fill($input)->save();
        return redirect('/posts');
    }


    public function show(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
