<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merits extends Model
{
    //
    protected $table = "tbl_merits";


    public function user_info(){

    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function admin(){

    	return $this->belongsTo(User::class,'admin_id','id');
    }

    public function cases(){

    	return $this->belongsTo(Cases::class,'case_id','case_id');
    }
}
