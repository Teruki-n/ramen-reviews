<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Store extends Model
{
    use HasFactory;
    
    public function posts()
    {
         //1対多 storeとpost
        return $this->hasmany(Post::class);
    }
    
    public function users()
    {
        //多対多
        return $this->belongsToMany(User::class);
    }
}
