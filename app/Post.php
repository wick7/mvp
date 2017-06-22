<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['photo_id', 'email'];
	
     public function user()
    {
    	return $this->Belongsto(User::class);
    }
    public function photo()
    {
    	return $this->hasMany(Photo::class);
    }

}
