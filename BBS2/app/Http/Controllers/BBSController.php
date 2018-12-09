<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Info;
use App\Attachment;
class BBSController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
    public function index(Request $request) {
    	
    	return redirect(route('main'));
    }
    public function show(Request $request, $id) {
		
		
		$msg = Info::find($id);
		$msg->hits = $msg->hits + 1;
		$msg->save();
		return view('bbs.view')->with('msg', $msg);
	}
	
	public function edit(Request $request, $row) {

		$row = Info::find($row);
		// return $row;
		return view('bbs.modify_form')->with("row", $row);
	}
	
    public function update(Request $request) {

	    $content = $request->get('content');
	    
		$this->validate($request, ['content'=>'required']);	  
		//$msg = Info::find($request->$id);
		$msg= DB::table('attachments')->where('id',$request->info_id)->get();
		//DB::statement('ALTER TABLE attachments DISABLE CONSTRAINT info_id CASCADE');
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	$msg= DB::table('infos')->where('id',$request->info_id)->update(['content'=>$content]);
 	    if($request->has('attachments')) {
		    foreach($request->attachments as $aid) {
		    	$attach = Attachment::find($aid);
		    	$attach->info()->associate($msg);
		    	$attach->save();
		    }
		} 
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return redirect(route('main'));
  	
	}
	
    public function create() {
    	return view('bbs.write_form');
	}
	
    public function store(Request $request) {
	    
	    $content = $request->get('content');
		
		$this->validate($request, ['content'=>'required']);	
	      
	    $board = new Info();
		$board->user_id = Auth::user()->id;
		$board->Writer = Auth::user()->nickName;
	    $board->content = $content;
	    $board->save();
	     if($request->has('attachments')) {
		    foreach($request->attachments as $aid) {
		    	$attach = Attachment::find($aid);
		    	$attach->info()->associate($board);
		    	$attach->save();
		    }
		}
	    return redirect('main');
	    
	}

	public function nav(){
		$user = \Auth::user()->nickName();
		
		$writer = DB::table('infos')->select('Writer', $user)->get();
		return redirect('main')->with('writer',$writer);

	}

    public function destroy(Request $request) {
		$id = $request->id;
		$aa = DB::table('attachments')->where('info_id', '=', $id)->delete();
		$msg = Info::find($id);
		$msg->delete();
		
		return redirect('main');
		// return $aa;
	}
	
    public function myArticles(Request $request) {
		$user = Auth::user();
		
    	$msgs = $user->infos()->orderBy('Regtime', 'desc')->with('user');
   
    	return view('main')->with('msgs', $msgs);   	
	}
	
	public function comment(Request $request){
		DB::table('comments')->insert(
			[	
				'board_num'=>$request->board_num,
				'writer'=>$request->writer,
				're_memo'=>$request->re_memo
			]);
			return $request;
	}
}