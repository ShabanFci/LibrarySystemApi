<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
				
class Borrow extends Model
{
    protected $fillable= ['date_issued' ,'date_due_for_return' , 'date_return' , 'book_id' , 'user_id'];

    public function book(){
    	return $this->belongsTo(Book::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
