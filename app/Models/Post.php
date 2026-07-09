<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title',
                            'body',
                            'image',
                            'publisher',
                            'category',
                            'published_at'];
    //
}
