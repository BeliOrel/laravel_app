<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name; by default table name equals class name (in this case 'post')
    protected $table = 'posts';
    // primary key field
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;

    // create relationship between user and post models
    public function user(){
      return $this->belongsTo('App\User');
    }
}
