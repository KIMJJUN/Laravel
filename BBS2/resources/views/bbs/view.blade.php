@extends('layouts.app')
<!-- 
	/*
		1. 클리어언트로부터 전송되어오 num 값을 추출
		2. 그 num 값으로 DB에서 게시글 레코드를 읽고
		3. 그 읽은 레코드를 이용해서 
		   게시글 상세정보를 html로 만든다.
	*/ -->


<html>
<head>
	<script>
		function processDelete(num) {

			result = confirm("Are you sure?");
			if(result == false) {
				return false;
			}

			$("#delete").submit();
		}
	</script>
</head>
<body>

	@section('title')
		게시글 상세 내용
	@endsection
	@section('content')
	<div class="form-group">
		<label for="title">제목: </label>
		<input type="text" id="title" class="form-control" value="{{$msg["Title"] }}" >
	</div>
	
	<div class="form-group">
		<label for="writer">작성자: </label>
		<input type="text" id="writer" class="form-control" value="{{$msg["Writer"]}}" >
	</div>

	<div class="form-group">
		<label for="regtime">작성일자: </label>
		<input type="text" id="regtime" class="form-control" value="{{$msg["Regtime"]}}" readonly>
	</div>


	<div class="form-group">
		<label for="hits">조회수: </label>
		<input type="text" id="hits" class="form-control" value="{{$msg["Hits"]}}" readonly>
	</div>

	
	<div class="form-group">
		<label for="content">내용: </label>
		<textarea rows="5" id="content"
			class="form-control" >{{$msg["Content"] }}</textarea>
		<button onclick="location.href='main'" type="submit" class="btn btn-primary">목록보기</button>	
		<button class="btn btn-warning"
		onclick="location.href='modify_form'">수정</button>
		<form action="delete" method="post">
			<?= csrf_field(); ?>
			<input type="hidden" name="num" value="{{$msg["Num"]}}">
			<input type="hidden" name="page" value="{{$page}}">
			
		<button type="submit" id ="delete" onclick="processDelete()"
		class="btn btn-danger"> 삭제하기</button>	
	</div>		
</body>
</html>
@endsection