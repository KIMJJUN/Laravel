<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
	<style>
	body#LoginForm{ background-image: url("img/iphone.png"); background-repeat:no-repeat; background-position:center; background-size:cover;  background-size: 100%;  margin: 1%; overflow: hidden;}



	.login-form .form-control {
		
  		background: #f7f7f7 none repeat scroll 0 0;
  		border: 1px solid #d4d4d4;
  		border-radius: 4px;

  		
		}
	.main-div {
  		margin: -3% auto -5%;
  		max-width: 38%;

  		padding: 140px 140px;
		}	


.login-form{ text-align:center;}
.sign a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}

.sign {
  text-align: left; margin-bottom:30px;
}
.font_justagram{
	font-family: 'Lobster Two', cursive;
}

	</style>
</head>


<body id="LoginForm">
		
		<h1 class="font_justagram" style="text-align: center; font-size: 80px; margin-top: 1%; "> <i class="fa fa-instagram" style="font-size:60px"></i>  Jueunstagram</h1>
<div class="login-form " >
	<div class="main-div">

		<h2 class= "font_justagram" style="font-size: 40px;">Jueunstagram</h2><br>

	
		<form id="Login" action="{{ route('login') }}" method="post">
			@csrf
			<div class="form-group">


				<input type="text" class="form-control" name="email" placeholder="UserName"  value="{{ old('email') }}">

			</div>

			<div class="form-group">

				<input type="password" class="form-control" name="password" placeholder="Password">

			</div>
			<button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
			<div class="sign mt-2">
			<a href="/register">아직 회원이 아니신가요?</a>
			<hr>
			</div>
			{{-- <button class="btn btn-danger" onclick="location.href='{{ url('/redirect') }}'" style="color:white; width:100%"><i class="fa fa-google-plus" style="font-size:18px;color:white"></i> &nbsp;&nbsp; Google로 로그인</button> --}}
			
			<a href="{{ url('/redirect/google') }}"  style="color:white;width:100%" class="btn btn-danger"><i class="fa fa-google-plus" style="font-size:18px;color:white"></i> &nbsp;&nbsp; Google로 로그인</a>
			<a href="{{ url('/redirect/instagram') }}" class="btn btn-secondary" style=" width:100%; margin-top:2%"><i class="fa fa-instagram" style="font-size:18px;"></i> &nbsp;&nbsp; Instagram으로 로그인</a>
			
		</form>
	</div>
</div>


		 <!-- 
		 1. Request에서 id와 password 값이 있는지 check...
		 2 있으면 
			2.1 id와 password를 검사...
		  2.2 id와 password가 일치하면 
		    2.2.1 ~님 환영합니다. 로그아웃버튼 출력 
		 3. id와 password 값이 없거나 일치하지 않으면
		 3.1 로그인 폼 출력  
		-->
	

	


				
	
	
</body>
</html>