<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    //
    protected $fillable = [
        'id','Writer','Content',
    ];
    
    public function user(){ //나를 사용하는 (단수)하나의 유저
        return $this->belongsTo(User::class); //게시글에게 유저테이블에서 값을 읽어와 보여줌
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);//하나의 게시글에는 여러개의 첨부파일이 있다.
    }
}
