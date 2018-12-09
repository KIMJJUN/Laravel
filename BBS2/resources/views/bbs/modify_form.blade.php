@extends('layouts.app')
@section('title')
게시글 수정
@endsection
@section('cssNscript')
<link href="/dist/dropzone.css" rel="stylesheet">
<script src="/dist/dropzone.js"></script>
@endsection
@section('content')
<div  style="width: 70%; margin: 0 auto; " >
@include('layouts.header')

<div class="container" style="width:100%">
    <div class="row justify-content-center">
        <div class="col-md-10" >
        <div class="card" style="margin-top: 20px; padding: 2%;">
          <header class="card-header">
          <h4 class="card-title mt-2" style="text-align:center" >게시물 수정</h4>
          </header>
          <br>
          <p style="text-align:center">수정할 부분을 수정해 주세요.</p>
        <form id="store" action="{{route('bbs.update', ['bb'=>$row->id])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$row['id']}}">
            
            <div class="form-group">
              
              <textarea class="form-control" rows="5" id="content" name="content">
                {!!$row->Content!!}
              </textarea>
            </div>
            
            @forelse($row->attachments as $attach) 
            
                <a href="{{'/files/' . Auth::user()->id . '/' . $attach->filename}}">
                {{$attach->filename}} 
                </a>
                
            @empty <li>첨부파일 없음</li> 
            @endforelse
          
        
        </form>


        <form action="{{route('attachments.store')}}"
            class="dropzone"
            id="dropzone" method="post" enctype="multipart/form-data">
                @csrf
        </form>
      
        
        
        <div style="margin:10px 0 50px 0" >
          <button type="submit" class="btn btn-outline-secondary mt-3" onclick="$('#store').submit()">수정</button>
          <a class="btn btn-outline-info mt-3" href="{{route('main')}}">목록보기</a>
        </div>
      </div>
    </div>
   </div>
  </div>
</div>

<script type="text/javascript">
  Dropzone.options.dropzone = {
      addRemoveLinks: true,
      removedfile: function(file) {
              var name = file.upload.filename;
              var fileid = file.upload.id;
              $.ajax({
                  headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                  type: 'DELETE',
                  url: '/attachments/'+fileid,
                  data: {filename: name},
                  success: function (data){
                      //console.log("File has been successfully removed!!");
                      alert(data + 'has been successfully removed!!');
                  },
                  error: function(e) {
                      //console.log(e);
                      alert(e);
                  }});
                  var fileRef;
                  return (fileRef = file.previewElement) != null ? 
                  fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },    
      success: function(file, response) {
          //alert(response.filename);
          file.upload.id = response.id;
          $("<input>", {type:'hidden', name:'attachments[]', value:response.id}).appendTo($('#store'));
      },
      error: function(file, response){
         return false;
      }
  }
</script>
@endsection

<script>

</script>