<?php 

namespace Models;
 
use \Illuminate\Database\Eloquent\Model;

class Task extends Model
{	
	// protected $timestamps = ['created_at','updated_at'];
	protected $fillable = ['username','status_id','email','text'];

	public function user()
    {
        return $this->belongsTo('\Models\User');
    }
}