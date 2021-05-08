<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
				
class Book extends Model
{
    protected $fillable=['isbn' ,'title' ,'date_of_publication' ,'auther_id' ,'category_id'];

    public function auther(){
    	return $this->belongsTo(Auther::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
