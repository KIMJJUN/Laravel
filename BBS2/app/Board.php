<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $fillable = ['Title','Writer','Content', 'Image'];//이것도 관례이다. ->여기있는거만 배열에 담아줌.

    public $timestamps = false;
}
