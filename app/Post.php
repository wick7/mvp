<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	
     public function user()
    {
    	return $this->Belongsto(User::class);
    }
    public function photo()
    {
    	return $this->hasMany(Photo::class);
    }
     public function organization()
    {
    	return $this->Belongsto(Organization::class);
    }

}
