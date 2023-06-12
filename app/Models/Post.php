<?php

namespace App\Models;

use App\Models\Coment;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','content'];

    //one to many relationship
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    //one to many : polymorphic

    public function comments()
    {
        return $this->morphMany(Coment::class, 'commentable');
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function latestComment()
    {
        return $this->hasOne(Comment::class)->latestOfMany();
    }

    public function oldestComment()
    {
        return $this->hasOne(Comment::class)->oldestOfMany();
    }
}
