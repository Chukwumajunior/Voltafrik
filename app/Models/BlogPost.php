<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'body', 'image', 'user_id', 'category', 'type', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'tel');
    }

}
