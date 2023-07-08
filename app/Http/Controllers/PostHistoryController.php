<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class PostHistoryController extends Controller
{
    public function index(Post $post)
    {
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(7);;
        
        return view('posts.post-history',compact('posts'));
    }
    
    public function edit(Post $post)
    {
         return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(Request $request,Post $post)
    {
        $input_post = $request['post'];
        if($request->file('image_url')){
            $image_url = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
            $input_post += ['image_url' => $image_url];
        }
        $post->fill($input_post)->save();
        return redirect('posts/history');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts/history');
    }
}
