<!DOCTYPE html>
<html>

<head>
    <title>갤러리</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
    <style>
    .font_justagram{
        font-family: 'Lobster Two', cursive;
    }
    </style>
</head>

<body style="width: 70%; margin: 0 auto; ">
        @include('layouts.header')
		<section>
			<form>
                <br><br><br><br>
                <fieldset style="width: 100%; margin: 0 auto;">
                    
					<legend >
                        <i class="fa fa-user-circle-o float-left " style="font-size:120px;margin-left: 20%"></i> 
                    <p class="float-left mt-4" style="font-size:120%;margin-left: 5%">{{\Auth::user()['nickName']}}<br>
                        <label>게시글 : {{$infosNum}}&nbsp;&nbsp;&nbsp;</label>
                        <label>팔로우 : 123 &nbsp;&nbsp;&nbsp;</label>
                        <label>팔로워 : 123 &nbsp;&nbsp;&nbsp;</label><br>
                        {{-- 버튼 모달 --}}
                        
                        <button type="button" class="btn btn-light float-right mr-4 mt-3" data-toggle="modal" data-target="#myModal" style="font-size:70%;"><i class="fa fa-cog" style="font-size:20px;"></i> &nbsp;프로필 편집</button>
                        
            
                        <div class="modal fade" id="myModal" role="dialog" >
                            <div class="modal-dialog modal-dialog-centered ">   
                            
                              <!-- Modal content-->
                              <div class="modal-content text-center" style="font-size:15px; width:90%">
                                                
                                           
                        
                                                <a class="list-group-item list-group-item-action list-group-item-dark" href="\logout">로그아웃하기</a>
                                                <a class="list-group-item list-group-item-action list-group-item-dark" href="\Personal_info">개인정보 수정</a>
                                                <a class="list-group-item list-group-item-action list-group-item-dark" href=" ">신고 기록</a>
                                                <a class="list-group-item list-group-item-action list-group-item-dark">취소</a>
                              </div>
                            </div>
                        </div>
                    
                    </p>
                        
                    </legend>
					<div class="mt-5">
                        
                        @foreach($infos as $row)
                        
                            <div class="float-left m-2 d-inline-block">
                                
                                <a href="{{ route('post',['id'=>$row->id]) }}">
                                    <img style="width:200px;height:200px" src="{{'/files/' . $row->user_id . '/' .$row->filename}}" >
                                </a>
                            </div>
                            
                        @endforeach
                    </div>
            
                
				</fieldset>
			</form>


		</section>



</body>

</html>
