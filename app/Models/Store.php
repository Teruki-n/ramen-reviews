<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Store extends Model
{
    use HasFactory;
    
    protected $table = 'stores';
    
    protected $casts = [
        'opening_hours' => 'array',
    ];
    
    protected $fillable = [
        'place_id',
        'name',
        'formatted_address',
        'opening_hours',
        'reviews',
        'latitude',
        'longitude',
        'review_count',
        'rating'
    ];
    
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
