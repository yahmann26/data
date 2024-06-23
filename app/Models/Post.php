<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=[
    "title",
    "description",
    "image",
    "user_id",
    "category_id",
    "tags_id",
   ];

   public function user(){
    return $this->belongsTo(User::class);
   }

   public function category(){
    return $this->belongsTo(Category::class);
   }

   public function tags(){
    return $this->belongsToMany(Tag::class);
   }

   public function comments(){
    return $this->hasMany(Comment::class);
   }


    use HasFactory;
}
