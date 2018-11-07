<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'coverpath', 'title', 'content', 'author', 'isbn'
    ];
}
