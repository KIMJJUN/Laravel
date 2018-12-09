<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
        protected $fillable = ['filename','bytes','mine'];
        public function info(){
            return $this->belongsTo(Info::class);
        }
        public function getUrlAttribute() {
            return url('files/'. \Auth::user()->id . '/' . $this->filename);
        }
       function deleteAttachedFile($filename) {
            $path = public_path('files') . DIRECTORY_SEPARATOR .  \Auth::user()->id  . DIRECTORY_SEPARATOR . $filename;
            if (file_exists($path)) {
                unlink($path);
            }
       }
        
}
