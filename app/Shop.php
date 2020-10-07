<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Shop extends Model
{
     protected $fillable = [
        'user_id','profile','address','phoneno','Email','Password',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
