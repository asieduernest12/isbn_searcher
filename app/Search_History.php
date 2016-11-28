<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Search_History extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'search_histories';

    public function User(){
    	return $this->belongsTo('App\User');
    }
}
