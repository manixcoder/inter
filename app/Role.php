<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'id','role',
	];

	protected $primaryKey = 'id';
	protected $table = 'users_role';

	public function users()
	{
		return $this->belongsToMany('App\User');		
	}
}
