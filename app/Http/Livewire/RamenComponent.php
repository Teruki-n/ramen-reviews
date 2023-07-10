<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\models\Post;

class RamenComponent extends Component
{
    public $kind;
    public $taste;
    public $pref;
    public $rating;

    public function mount() 
    {
        // Initialize variables
        $this->kind = [];
        $this->taste = [];
        $this->pref = [];
        $this->rating = [];
    }

    public function render()
    {
        $posts = Post::query();

        if($this->kind){
            $posts->whereIn('kind', $this->kind);
        }
        
        if($this->taste){
            $posts->whereIn('taste', $this->taste);
        }
        
        if($this->pref){
            $posts->whereIn('pref', $this->pref);
        }
        
        if($this->rating){
            $posts->whereIn('rating', $this->rating);
        }

        $posts = $posts->get();

        return view('livewire.ramen-component', [
            'posts' => $posts
        ]);
    }
    
    public function updated($field)
    {
        $this->validate([
            'kind' => 'array',
            'taste' => 'array',
            'pref' => 'array',
            'rating' => 'array',
        ]);
    }
}