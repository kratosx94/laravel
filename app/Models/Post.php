<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // preventing users from using harmful codes into the forms
    protected $fillable = ['title', 'excerpt','body', 'id'];
    // preventing N+1
    protected $with = ['category', 'author'];

    public function scopeFilter($query)
    {
        if (request('search')){
        $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
    }}
    // relations function

    public function comments(){

        return $this->hasMany(Comment::class);
    }

     public function category(){

        return $this->belongsTo(Category::class);

    }

    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }
}



