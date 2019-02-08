<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    //primary
    public $primaryKey = 'id';
    //Times Stamps
    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
