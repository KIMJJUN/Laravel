<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	body#LoginForm{ background-image: url("img/iphone.png"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:1%; background-size: 100%;  margin: 2%; overflow: hidden;}

	.panel h2{ color:#444444; font-size:18px; margin:50px 0 0px 0;}
	.panel p { color:#777777; font-size:14px; margin-bottom:0px; line-height:24px;}
	.login-form .form-control {
  		background: #f7f7f7 none repeat scroll 0 0;
  		border: 1px solid #d4d4d4;
  		border-radius: 4px;
  		font-size: 14px;
  		height: 50px;
  		
		}
	.main-div {
  		
  		
  		margin: 20px auto 30px;
  		max-width: 38%;
  		padding: 60px 70px 30px 70px;
		}	


.login-form{ text-align:center;}
.sign a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #4c34d3 none repeat scroll 0 0;
  border-color: #4c34d3;
  color: #ffffff;
  font-size: 18px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.sign {
  text-align: left; margin-bottom:30px;
}


	</style>
</head>


<body id="LoginForm">
	
		<h1 style="text-align: center; font-family: 'billabong'; font-size: 80px; margin-top: -20px; "> <i class="fa fa-instagram" style="font-size:60px"></i>  Jueunstagram</h1>
	
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2 style="font-size: 40px; margin-top: 30px; font-family: 'billabong';">Interstella</h2><br>
   <p>Please enter your Id and Password</p><br>
   </div>
    <form id="Login" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">


            <input type="text" class="form-control" name="email" placeholder="UserName"  value="{{ old('email') }}">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="pw" placeholder="Password">

        </div>
        <div class="sign">
        <a href="/register">아직 회원이 아니신가요?</a>
</div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>

</div></div></div>

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