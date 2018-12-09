@extends('layouts.app')

@section('cssNscript')
<script type="text/javascript" src="jquery/lib/jquery.js"></script>
<script type='text/javascript' src='jquery/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='jquery/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='jquery/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery.autocomplete.css" />
@endsection




@section('content')
<div  style="width: 70%; margin: 0 auto; " >



    @include('layouts.header')
    <br>

@foreach($data as $info)
<div class="border col-md-9 mt-4 float-left">
    <div class="ml-5 mt-5" onclick="location.href='gallery'">
            <i class="fa fa-user-circle-o float-left" style="font-size:40px;color:gray" ></i> <p style="font-size:150%">{{$info['Writer']}}</p>
    </div>
    <br>
    <div>
        <!--class=" shadow p-2 mb-2 bg-white ml-4 md-3 mr-4"-->
           
        <img class=" shadow p-2 mb-2 bg-white ml-4 md-3 mr-4" src="{{'/files/' . Auth::user()->id . '/' . $info['filename']}}" width="500px"; height="500px";>

            <p>{{$info['Content']}}
                <button type="button" class="btn float-right" data-toggle="modal" data-target="#myModal{{$info['id']}}" style="color:gray">≡</button>
            </p>

                <!-- Modal -->
        <div class="modal fade" id="myModal{{$info['id']}}" role="dialog" >
    <div class="modal-dialog modal-dialog-centered ">   
    
      <!-- Modal content-->
      <div class="modal-content text-center">
                        
                    @if(\Auth::user()['nickName'] == $info['Writer'])

                        <li class="list-group-item list-group-item-action list-group-item-dark">게시물 수정</li>
                        <li class="list-group-item list-group-item-action list-group-item-dark">게시물 삭제</li>
      <li class="list-group-item list-group-item-action list-group-item-dark" onclick="location.href='post'">게시물로 이동</li>
                        <li class="list-group-item list-group-item-action list-group-item-dark">댓글보기</li>

                    @else

                        <li class="list-group-item list-group-item-action list-group-item-dark">부적절한 게시글 신고</li>
                        <li class="list-group-item list-group-item-action list-group-item-dark">팔로우 취소</li>
                        <li class="list-group-item list-group-item-action list-group-item-dark" onclick="location.href='post'">게시물로 이동</li>
                        <li class="list-group-item list-group-item-action list-group-item-dark">댓글보기</li>

                    @endif
                
      </div>
      
    </div>
  </div>

                <div class="text-left">
                    <button type="button" class="btn btn-outline-light text-dark float-left" onclick="location.href=''"><i class="fa fa-heart-o" style="font-size:25px;color:gray"></i></button>
                    <button type="button" class="btn btn-outline-light text-dark float-left" onclick="location.href=''"><i class="fa fa-comment-o" style="font-size:25px;color:gray"></i></button>
                    <button type="button" class="btn btn-outline-light text-dark " onclick="location.href=''"><i class="fa fa-download" style="font-size:25px;color:gray"></i></button>
                        
                    
                </div>    
                <h5 class="mt-5 ml-4 md-4 mr-4">댓글달기</h5>
        </div>
    </div>
</div>
@endforeach
<div class="col-md-2" style="position:fixed; right: 220px;">
    <div class="mt-3 mb-3"  >
    <a href="gallery" style="text-decoration:none; color:black"><i class="fa fa-user-circle-o float-left ml-3 mt-3 mr-3" style="font-size:40px;color:gray"></i> 
        <p style="font-size:150%;padding:18px;">{{\Auth::user()['nickName']}}</p>
    </a>
    
        {{-- <button type="button" class="btn" oncli>Basic</button> --}}
        
    </div>

    <div class="col-md-10s border" style="overflow-y: scroll; height:100px"> 
           
            <i class="fa fa-user-circle-o float-left" style="font-size:25px; "></i> <p style="font-size:110%;padding:3px;">닉네임</p>
            <i class="fa fa-user-circle-o float-left" style="font-size:25px; "></i> <p style="font-size:110%;padding:3px;">닉네임</p>
            <i class="fa fa-user-circle-o float-left" style="font-size:25px; "></i> <p style="font-size:110%;padding:3px;">닉네임</p>
            <i class="fa fa-user-circle-o float-left" style="font-size:25px; "></i> <p style="font-size:110%;padding:3px;">닉네임</p>
    </div>
    <br>
    <div class="col-md-10s border fixed"> 
            <small style="color:gray">Instagram 정보 * 지원 * 홍보 <br>센터 * API채용정보 * <br> 개인정보처리방침약관 * 디렉터리 *  프로필 * 해시태그 * 언어<br>
                © 2018 jueunstagram</small>
    </div>
</div> 
</div>
