@extends('layouts.app')

@section('cssNscript')
<script type="text/javascript" src="jquery/lib/jquery.js"></script>
<script type='text/javascript' src='jquery/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='jquery/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='jquery/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery.autocomplete.css" />
@endsection




@section('content')
<div  style="width: 70%; height:100px; margin: 0 auto;" >
@include('layouts.header')

<div class="float-left d-flex flex-row ml-5" style="margin-top:-3.5%">
    <i class="fa fa-search float-left p-1" style="font-size:24px; color: gray"></i>&nbsp;&nbsp;&nbsp;
    {{-- <form action="{{url('/search')}}" method="post"> --}}
        <input id = "searchbox" type="text" name="search" class="form-control text-center" style="width:100%; height:30%" placeholder="검색">
    {{-- </form> --}}
</div>
<br>
@foreach ($info as $row)
<div class="border col-md-9 mt-4 float-left ">
    <div class="ml-5 mt-5" onclick="location.href='gallery'">
            <i class="fa fa-user-circle-o float-left" style="font-size:40px;color:gray" ></i><p style="font-size:150%;"> &nbsp;{{$row->Writer}}</p>
    </div>
    <br>
    <div>
                    <div>
                       
                        <p style="font-size:100%;margin-top:-1%;margin-left:6%"> <i class="fa fa-clock-o" style="font-size:15px;color:gray"></i>&nbsp; {{$row->created_at}}</p>
                    </div>
                    <div class="ml-4">
                        @if(Auth::user()->id == 2)
                        <img class=" shadow p-2 mb-2 bg-white ml-4 md-3 mr-4" src="{{'/files/' . Auth::user()->id . '/' . $row->filename}}" width="500px"; height="500px";>
                        @else
                        <img class=" shadow p-2 mb-2 bg-white ml-4 md-3 mr-4" src="{{'/files/' . 2 . '/' . $row->filename}}" width="500px"; height="500px";>
                        
                        @endif
                    </div>
                        
        
        <div class="ml-4 mt-4 md-4 mr-4 ml-5">
            <p>{{$row->Content}}
                <button type="button" class="btn float-right mt-2" data-toggle="modal" data-target="#myModal{{$row->id}}" style="color:gray">≡</button>
            </p>

                <!-- Modal -->
        <div class="modal fade" id="myModal{{$row->id}}" role="dialog" >
    <div class="modal-dialog modal-dialog-centered ">   
    
      <!-- Modal content-->
      <div class="modal-content text-center">
                        
                    @if(\Auth::user()['Name'] == $row->Writer)
                    
                        <a class="list-group-item list-group-item-action list-group-item-dark" href="{{route('bbs.edit', ['bb'=>$row->info_id])}}">게시물 수정</a>
      <a class="list-group-item list-group-item-action list-group-item-dark" href="{{route('delete',['id'=>$row->info_id])}}">게시물 삭제</a>
                        <a class="list-group-item list-group-item-action list-group-item-dark" href="{{ route('post',['id'=>$row->info_id]) }}">게시물로 이동</a>
                        <li class="list-group-item list-group-item-action list-group-item-dark">댓글보기</li>

                    @else

                        <li class="list-group-item list-group-item-action list-group-item-dark">부적절한 게시글 신고</li>
                        <li class="list-group-item list-group-item-action list-group-item-dark">팔로우 취소</li>
                        <a class="list-group-item list-group-item-action list-group-item-dark" href="{{ route('post',['id'=>$row->id]) }}">게시물로 이동</a>                        
                        <li class="list-group-item list-group-item-action list-group-item-dark">댓글보기</li>

                    @endif
                
      </div>
      
    </div>
  </div>
                <div class="text-left">
                    <a><i class="fa fa-heart-o float-left" style="font-size:25px;color:gray;"></i></a>
                    <a><i class="fa fa-comment-o float-left ml-4" style="font-size:25px;color:gray;margin-top:-2px"></i></a>
                    <a><i class="fa fa-download float-left ml-4" style="font-size:25px;color:gray"></i></a> 
                </div><br><br>

                
                <form id="form_comment"action="/comment" method="post">
                    @csrf
                <input type="hidden" name="board_num" value="{{$row->info_id}}" readonly>
                <input type="hidden" name="writer" value="{{$row->Writer}}" readonly>
                
                <textarea class="form-control float-left " rows="1"style="width:90%;"name="re_memo"></textarea>&nbsp;
                <input class ="btn"type="button" id="submit_comment" value="등록"><br><br>
                {{-- <input type="submit" id="" value="등록"> --}}
                </form>
                <div id="commentTable"  width="800" cellpadding="5" cellspacing="2" style="table-layout:fixed; word-break:break-all;">
                        @foreach ($comment as $cmt)
                        <div class="col-sm-1">
                                <div class="thumbnail">
                                <img class="img-responsive user-photo" src={{Auth::user()->profil }} >
                                </div><!-- /thumbnail -->
                                </div>
                                <div>
                                        <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <strong>{{$cmt->writer}}</strong> 
                                        <span class="text-muted">{{$cmt->re_date}}</span>
                                        </div>
                                        <div class="panel-body">
                                                {{$cmt->re_memo}}
                                        </div><!-- /panel-body -->
                                        </div><!-- /panel panel-default -->
                                        </div>
                        @endforeach
                        

                </div>
        </div>
    </div>
</div> 
@endforeach

<div class="col-md-2" style="position:fixed; top: 22%; right:15%;">
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
            <small style="color:gray">jueunstagram 정보 * 지원 * 홍보 <br>센터 * API채용정보 * <br> 개인정보처리방침약관 * 디렉터리 *  프로필 * 해시태그 * 언어<br>
                © 2018 jueunstagram</small>
    </div>
</div>
</div>
<script>

        var search = {!! $search !!};
        var availableTags = [];

        for(var i in search){
            for(var j in search[i]){
                availableTags.push([search[i][j]]);
            }
        }
        console.log(availableTags);

        $(document).ready(function() {
            $("#searchbox").autocomplete(availableTags,{ 
                matchContains: true,
                selectFirst: false
            });
        });
        $(function() {
            $('#submit_comment').click(function() {
                var data = $("#form_comment").serialize();
                console.log(data);
                $.ajax({
                    type:"POST",
                    url:"{{ url("/comment") }}",
                    data:data,
                    dataType:"html",
                    success:function(data) {
                        console.log(data);
                        var comment_data = JSON.parse(data);
                        var writer = comment_data['writer'];
                        var textArea = comment_data['re_memo'];
                        var test = '<div><div class="panel panel-default"><div class="panel-heading"> <strong>'+writer+'</strong> <span class="text-muted"></span></div><div class="panel-body">' + textArea + '</div></div></div>'
                        
                        $('#commentTable').append(test);
                    }
                })
            })
        });

    </script>

</div>
@endsection

