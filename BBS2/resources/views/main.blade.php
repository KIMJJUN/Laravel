<!DOCTYPE html>
<html lang="en">
<head>
<title>1701068 김주은</title>
<meta charset="utf-8">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<style>

</style>
</head>
<body  style="width: 70%; margin: 0 auto; " >



<header >
    <div style="background-color: #105785;" onclick="location.href='main'">
        <h1 style="text-align: center; font-family: 'billabong'; font-size: 80px; padding: 10px; color: white; margin: 0 auto;"> <i class="fa fa-instagram" style="font-size:60px"></i>  Instagram</h1>
    </div>
        <div class="float-left mt-3 d-flex flex-row ml-5">
            
            <i class="fa fa-search float-left p-1" style="font-size:24px; color: gray"></i>&nbsp;&nbsp;&nbsp;
            <input type="search" class="form-control form-control-sm text-center p-2" placeholder="검색">

        </div>
        <div class="text-right">

            <button type="button" class="btn btn-outline-light text-dark" onclick="location.href='write_form'"><i class="fa fa-pencil" style="font-size:36px"></i></button>
            <button type="button" class="btn btn-outline-light text-dark" onclick="location.href=''"><i class="fa fa-bell" style="font-size:36px"></i></button>
            <button type="button" class="btn btn-outline-light text-dark" onclick="location.href=''"><i class="fa fa-send" style="font-size:36px"></i></button>
            <button type="button" class="btn btn-outline-light text-dark" onclick="location.href='/gallery'"><i class="fa fa-user-circle-o" style="font-size:36px"></i></button>

        </div>

</header>
<br>
@foreach ($info as $img)

<div class="border col-md-9 mt-4 float-left">
    <div class="ml-5 mt-5" onclick="location.href='gallery'">
            <i class="fa fa-user-circle-o float-left" style="font-size:40px" ></i> <p style="font-size:150%">닉네임</p>
    </div>
    <br>
    <div>
        <!--class=" shadow p-2 mb-2 bg-white ml-4 md-3 mr-4"-->
           
    <img src="{{asset($info->Img)}}" width="500px"; height="500px";>
        
        <div class="ml-4 mt-4 md-4 mr-4">
            #집에가자
        </div>
        <div>
                <div class="text-left">
                    <button type="button" class="btn btn-outline-light text-dark float-left" onclick="location.href=''"><i class="fa fa-heart-o" style="font-size:25px"></i></button>
                    <button type="button" class="btn btn-outline-light text-dark float-left" onclick="location.href=''"><i class="fa fa-comment-o" style="font-size:25px"></i></button>
                    <button type="button" class="btn btn-outline-light text-dark " onclick="location.href=''"><i class="fa fa-download" style="font-size:25px"></i></button>
                        
                    
                </div>    
                <h5 class="mt-5 ml-4 md-4 mr-4">댓글달기</h5>
        </div>
    </div>
</div> 


@endforeach
<div class="col-md-3">
    <div class="ml-3 mt-3" >
        <i class="fa fa-user-circle-o float-left" style="font-size:40px" onclick="location.href='gallery'"></i> <p onclick="location.href='gallery'" style="font-size:150%">닉네임</p>
        {{-- <button type="button" class="btn" oncli>Basic</button> --}}
        <a href="/logout">logout</a>
        <br>
    </div>
    <div class="col-md-10s border"> 
            <i class="fa fa-user-circle-o float-left" style="font-size:20px;"></i> <p style="font: size 100%">닉네임</p>
            <i class="fa fa-user-circle-o float-left" style="font-size:20px; "></i> <p style="font-size:100%">닉네임</p>
            <i class="fa fa-user-circle-o float-left" style="font-size:20px; "></i> <p style="font-size:100%">닉네임</p>
    </div>
    <br>
    <div class="col-md-10s border fixed"> 
            <small style="color:gray">Instagram 정보 * 지원 * 홍보 <br>센터 * API채용정보 * <br> 개인정보처리방침약관 * 디렉터리 *  프로필 * 해시태그 * 언어<br>
                © 2018 jueunstagram</small>
    </div>
</div>
</body>

</html>

