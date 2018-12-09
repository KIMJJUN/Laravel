<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Attachment;
use App\infos;

class AttachmentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {

        if($request->hasFile('file')) {
    		$file = $request->file('file');
 			
    		$filename = /*str_random().*/filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
    		$bytes = $file->getSize();
            $user = \Auth::user();
            $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id; //운영체제마다 분리방법이 다르기에!
            //C:\jekim\Laravel\boards\public\files\3 path는 이런식일 것이다.
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true); //0777 : rwx권한 다주겠다.(누구나 읽고 쓸수있도록)
            }
            
            $file->move($path, $filename);
        $payload = [
            'filename'=>$filename,
            'bytes'=> $bytes,
            'mime'=>$file->getClientMimeType() //파일 타입
        ];//하나의 레코드로 만들어짐.
        
        $attachment =  Attachment::create($payload);
        
        }
        return response()->json($attachment, 200);
        //json : {'fileName':'a.jpg','bytes':4567,'mine':'jpg'}

    }

    public function destroy(Request $request, $id)
    {
        $filename =  $request->filename;
        $attachment = Attachment::find($id);
        $attachment->deleteAttachedFile($filename);
        $attachment->delete();
        $user = \Auth::user();
        return $filename;  
    }

    // public function aa(Request $request){
    //     $id = $request->id;

    //     $filename = Attachment::where('id',$id)->select('filename')->get();
    //     DB::table('info')->where('id',$id)->update(['img',$filename]);



    // }
}
