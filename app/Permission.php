<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey = 'p_id';
	protected $table = 'permission';
    protected $fillable = [
    	'p_name','p_pid','p_c','p_a','ps_route','ps_level','show'
    ];
}
