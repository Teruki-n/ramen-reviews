<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Store;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'name',
    'kind',
    'taste',
    'kind',
    'pref',
    'rating',
    'comment',
    'image_url',
    ];



    public function user()
    {
        //1対多 userとpost
        return $this->belongsTo(User::class);    
    }
    
    //   public function store()
    // {
    //      //1対多 storeとpost
    //     return $this->belongsTo(Store::class);    
    // }

}

