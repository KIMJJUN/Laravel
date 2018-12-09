@extends('layouts.app')

	@section('cssNscript')
	 <link href="{{asset('/dist/dropzone.css')}}" rel="stylesheet">
	 <script src="{{asset('/dist/dropzone.js')}}"></script>	
	 
	@endsection
@section('title')
글 등록
@endsection
	
	
		 
	 @section('content')
	 <div style="width: 70%; height:100px; margin: 0 auto;" >
	 @include('layouts.header') 
	 
	 <div class="row justify-content-center">
	 <div class="col-md-10" >
	 <div class="card" style="margin-top: 20px; padding: 2%;">
		 <header class="card-header">
		 <h4 class="card-title mt-2" >새 게시물 등록</h4>
	 	</header>
	 <br>
	   <p >등록할 게시물에 대해 설명해주세요.</p>
	   <form action="{{route('attachments.store')}}" class="dropzone mt-2" id="dropzone">
		{{csrf_field()}}
		</form>	
		
	   <form id="store" action="{{route('bbs.store')}}" method="post">
			@csrf
			<textarea class="form-control mt-3" rows="5" id="content" name="content"
			required>{{old('content')}}</textarea>
			 	
		 </form>
		 <div>
		
		 <button type="submit" class="btn btn-outline-secondary mt-3" style="width:10%" onclick="$('#store').submit()">글등록</button>	
		 <button onclick="location.href='main'" class="btn btn-outline-info mt-3"style="width:10%">목록보기</button>	
		</div>
		
		 <script type="text/javascript">
			Dropzone.options.dropzone = {
				addRemoveLinks: true,//파일 드래그&드랍하고 삭제하고 싶을 때(서버에 저장된 것을 삭제하고 싶으면 따로 코딩해야함)
				
				success: function(file, response) {
					//alert(response.filename);
					file.upload.id = response.id;
					$("<input>", {type:'hidden', name:'attachments[]', value:response.id}).appendTo($('#store'));
				},
				error: function(file, response){
				   alert(error);
				   return false;
				}
			}
		  </script>
	 </div>
	 </div>
	 </div>
	</div>
	@endsection