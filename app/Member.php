<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'm_id';
	protected $table = 'member';
    protected $fillable = [
    	'username','pl_id','password'
    ];
}
