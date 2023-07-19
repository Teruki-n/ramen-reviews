<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


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

    protected $casts = [
        'image_url' => 'array'
    ];

    public function user()
    {
        //1対多 userとpost
        return $this->belongsTo(User::class);    
    }

}

