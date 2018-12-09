<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\info;
use App\Attachment;
use App\Comment;

class MainController extends Controller
{
    public function index()
    {
        // $info = DB::table('infos')->orderBy('id','desc')->get();
        $search = DB::table('infos')->select('Writer','Content')->orderBy('id','desc')->get();
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
    
        
        // return response()->json($info, 200, [], JSON_PRETTY_PRINT);

        return view('main',['info'=>$info,'search'=>$search,'comment'=>$comment]);
        //return view('main');
    }
    public function gallery(){
        
        $info = DB::table('infos')
        ->join('attachments', 'infos.id', '=', 'attachments.info_id')
        ->select('infos.*', 'attachments.*')
        ->where('Writer', \Auth::user()['nickName'])->orderBy('infos.id','desc')
        // ->where('infos.created_at','=','attachments.created.at')
        ->get();
        
        $infosNum = info::where('Writer', \Auth::user()['nickName'])->count();

        return view('gallery')
        ->with('infos', $info)
        ->with('infosNum', $infosNum);
    }
    public function post(Request $request){
         
        $id = $request->id;
        $Writer = Auth::user()['nickName'];

        $a = DB::table('infos')
        ->join('attachments', 'infos.id', '=', 'attachments.info_id')
        ->select('infos.*', 'attachments.*')
        ->where('infos.id',$id )->get();
        // ->where('infos.created_at','=','attachments.created.at')

        $data=json_decode($a,true);
        return view('post')->with('data',$data);
        
    }
    

    // public function search(Request $request){
    //     $info = info::where('Writer', 'like', '%'.$request->search.'%')->orderBy('id','desc');
        
    //     return view('main')->with('info', $info->get());
    // }
}
