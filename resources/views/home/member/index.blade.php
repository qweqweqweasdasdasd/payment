@extends('admin/common/master')
@section('title','login')
@section('css')
<link href="{{asset('/admin/static/h-ui.admin/css/H-ui.login.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="row cl">
        <label class="form-label col-xs-3"></label>
        <div class="formControls col-xs-8">
          <input  name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"></label>
		<div class="formControls col-xs-8 col-sm-8">
			<select class="select" name="pl_id" size="1" style="width:150px;">
                @foreach($getPlatformIdAndName as $k=>$v)
				<option value="{{$k}}">{{$v}}</option>
				@endforeach
			</select>
		</div>
	</div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input  type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('js')
<script>
//登录
$('form').on('submit',function(evt){
    evt.preventDefault();
    var data = $(this).serialize();
    //ajax
    $.ajax({
        url:'/member/login',
        data:data,
        dataType:'json',
        type:'post',
        success:function(res){
            if(res.code == 422){
              layer.msg(res.msg)
            }
            if(res.code == 0){
              layer.msg(res.msg)
            }
            if(res.code == 1){
                
                window.location.href = ''
            }
        }
    })
})
</script>
@endsection