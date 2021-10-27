<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';
    public $timestamps = true;

    protected $fillable = array('id','user_id','company_name', 'job_title', 'location', 'applicant', 'create_on', 'official_emaili', 'offer', 'job_description', 'status', 'created_at', 'updated_at');
}
