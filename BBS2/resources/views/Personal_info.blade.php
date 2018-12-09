@extends('layouts.app')
@section('cssNscript')
	 <link href="{{asset('/dist/dropzone.css')}}" rel="stylesheet">
	 <script src="{{asset('/dist/dropzone.js')}}"></script>	
	 
	@endsection
@section('content')

<div style="width: 70%; height:100px; margin: 0 auto;" >	 
@include('layouts.header')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('개인정보 수정') }}</div>
                <br>
                <p style="text-align: center;"> 변경 항목만 변경 해 주세요. </p>
                <div class="card-body">
                <form method="POST" id = "store" action="register/update" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" value="{{auth()->user()->Name}}" required autofocus>

                                @if ($errors->has('Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nickName" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="nickName" type="text" class="form-control{{ $errors->has('nickName') ? ' is-invalid' : '' }}" name="nickName" value="{{auth()->user()->nickName}}" required autofocus>

                                @if ($errors->has('nickName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{auth()->user()->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                            
                        </form>
                        <div class="form-group row">
                                <label for="file"class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <form action={{route('profiles.store')}} class="dropzone mt-2" id="dropzone" name="file">
                                        {{csrf_field()}}
                                </form>	
                               </div> 
                               <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="button" class="btn btn-primary" onclick="$('#store').submit()">
                                            {{ __('수정하기') }}
                                        </button>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
