<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    protected $table = 'job_applied';
    public $timestamps = true;    
    protected $fillable = array('id','user_id','job_id', 'created_at', 'updated_at');
}
