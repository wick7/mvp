<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function user()
    {
    	return $this->has(User::class);
    }
    public function post()
    {
    	return $this->has(Post::class);
    }
}
