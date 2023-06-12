<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;

    //protected $fillable = ['content']; //pour filtrer les champs qu'on peut enregistrer dans la bd
    protected $guarded = []; //pour autoriser tout enregsitrement

    public function commentable()
    {
        return $this->morphTo();
    }
}
