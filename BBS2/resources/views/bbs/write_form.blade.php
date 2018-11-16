@extends('layouts.app')

	@section('title')
	 글 등록
	 @endsection
	 
	 @section('content')
		 
		 <style>
			 .py-4{
				background-image: url('img/background.png');
			 }

			 </style>
		 
	 </head>
	 
		 <br>  <p class="text-center" style="font-size: 70px; font-family: 'billabong'; margin-top: -30px;"><i class="fa fa-instagram" style="font-size:60px"></i> Instagram</p>
	 <hr>	
		 <div class="row justify-content-center">
	 <div class="col-md-6" >
	 <div class="card" style="margin-top: 20px; padding: 2%;">
		 <header class="card-header">
		 <h4 class="card-title mt-2" style="text-align: center;">새 게시물 등록</h4>
	 
	 
	 </header>
	 <br>
	   <p style="text-align: center;">등록할 게시물에 대해 설명해주세요.</p>
		 <form action="write" method="post" enctype="multipart/form-data">
			@csrf
			 <div class="form-group">
				 <label for="writer">작성자: </label>
				 <input type="text" id="writer" name="writer" value="" class="form-control" readonly>	
			 </div>
			 <div class="form-group">
				 <label for="title">제목: </label>
				 <input type="text" id="title" name="title" class="form-control" required>
			 </div>
			 
			   <div class="form-group">
				 <label for="file">파일: </label>
				 <input type="hidden" name="token">
				 <input id="file"type="file" name="img"><br>
				   <div id="img_section" name="img"></div>
				   <textarea name="content" rows="5" style="width: 100%; margin-top: 2%;"></textarea>		
					   
				</div>
			 
			 <div class="form-group">
				 
				 <button type="submit" class="btn btn-outline-secondary">글등록</button>	
				 <button onclick="location.href='main'" class="btn btn-outline-info">목록보기</button>
			 </div>		
		 </form>		
	 </div>
	 </div>
	 </div>
	 
	 
	 @endsection