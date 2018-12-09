<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['writer','re_memo','re_date'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function info(){
        return $this->belongsTo(Info::class);
    }
}
