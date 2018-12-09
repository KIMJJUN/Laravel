<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "23123";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "2312dddddd3";
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $search = DB::table('infos')->select('Writer','Content')->get();
        // $attach = Attachment::select('filename');

        // $info = info::joinSub($attach, 'attachments', function($join){
        //     $join->on('infos.id', '=', 'attachments.info_id');
        // })->get();
        $info = DB::table('infos')
        ->join('attachments', 'infos.id', '=', 'attachments.info_id')
        ->select('infos.*', 'attachments.*')->orderBy('infos.id','desc')
        // ->where('infos.created_at','=','attachments.created.at')
        ->get();

        
        $comment = DB::table('comments')->get();

        return view('main',['info'=>$info,'search'=>$search,'comment'=>$comment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = \Auth::user();
        // if($request->hasFile('file')) {
    	// 	$file = $request->file('file');
 			
    	// 	$filename = /*str_random().*/filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
    	// 	$bytes = $file->getSize();
        //     $user = \Auth::user();
        //     $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id; //운영체제마다 분리방법이 다르기에!
        //     //C:\jekim\Laravel\boards\public\files\3 path는 이런식일 것이다.
        //     if (!File::isDirectory($path)) {
        //         File::makeDirectory($path, 0777, true, true); //0777 : rwx권한 다주겠다.(누구나 읽고 쓸수있도록)
        //     }
            
        //     $file->move($path, $filename);
        //     $payload = [
        //     'filename'=>$filename,
        //     'bytes'=> $bytes,
        //     'mime'=>$file->getClientMimeType() //파일 타입
        //     ];//하나의 레코드로 만들어짐.
        
        // $User =  User::create($payload);
        
        // }
        // $file = response()->json($User, 200);
        // //json : {'fileName':'a.jpg','bytes':4567,'mine':'jpg'}
        User::where('email', $user->email)->update([
            'Name' => $request->Name,
            'nickName' =>$request->nickName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        
        ]);
        return redirect(route('main'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
