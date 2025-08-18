<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
  protected $fillable = ['title', 'content', 'category', 'user_id', 'likes', 'comments_count']; 
   protected $table = 'posts';
}