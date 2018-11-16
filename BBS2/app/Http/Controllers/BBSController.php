<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Board;


class BBSController extends Controller
{
    public function index(){
	 return view('main')-pagenate(5);
}//index end
   public function create(){
      return view('bbs.write_form');
   }//create end


   public function store(Request $request){
		
		$file=$request->file('img');
		$path='img';
		$file->move($path, $file->getClientOriginalName());


		DB::table('info')->insert([
			'Title'=>$request->title,
			'Writer'=>$request->writer,
			'Content'=>$request->content,
			'Img'=>$file->getClientOriginalName(),
			
		]);

		return view('main');

	// require_once("tools.php");
	// require_once("BoardDao.php");

	// $title = requestValue("title");
	// $writer = requestValue("writer");
	// $content = requestValue("content");



	// if ($title && $writer && $content  ) {
	// 	$regtime = date("Y-m-d H:i:s");
	// 	// DB에 insert
	// 	$dao = new BoardDao();
	// 	$dao->insertMsg($title, $writer, $content);
	// 	return redirect('board')->with('message','정상적으로 입력되었습니다');
	
	// } else {
	// 	errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
	// }


   }//store end


   public function show(){
   // 	require_once("BoardDao.php");
	// require_once("tools.php");
   // 	$num = requestValue("num");
	// $page = requestValue("page");
	// $dao = new BoardDao();
	// $dao->increaseHits($num);
	// $msg = $dao->getMsg($num);
	// return view('bbs.view')->with('num',$num)
	// ->with('page',$page)
	// ->with('msg',$msg);

	}//show end
	
	
   public function update(){
   	require_once("BoardDao.php");
	require_once("tools.php");

	$content = requestValue("content");	
	$title = requestValue("title");
	$num = requestValue("num");
	$writer = requestValue("writer");

	if($content && $title && $writer) {
		$dao = new BoardDao();
		$dao->updateMsg($num, $title, $writer, $content);
		return redirect('board')->with('message','게시글이 수정되었습니다');

	} else {
		errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
	}
   }//update end
   public function edit(){
   	require_once("tools.php");
	require_once("BoardDao.php");
   	$num = requestValue("num");	
	$dao = new BoardDao();
	$msg = $dao->getMsg($num);
   	return view('bbs.modify_form')->with('num',$num)
   	->with('msg',$msg);

   }//edit end
   public function delete(){
	require_once("tools.php");
	require_once("BoardDao.php");

	$num = requestValue("num");
	$dao = new BoardDao();

	$dao->deleteMsg($num);

	return redirect('board?page=$page')->with('message','삭제되었습니다.');
   }//delete end
}