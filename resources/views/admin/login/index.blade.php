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
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input  name="mg_name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe63f;</i></label>
        <div class="formControls col-xs-8">
          <input  name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="number" name='code' placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:180px;">
          <img src="{{Captcha::src()}}" onclick="this.src = '{{Captcha::src()}}?' + Math.random() "></div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input  type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input  type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
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
        url:'/admin/login',
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
              window.location.href = '/admin/index'
            }
        }
    })
})
</script>
@endsection