@extends('admin/common/master')
@section('title','添加平台')
@section('content')
<article class="page-container">
	<form class="form form-horizontal">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">平台名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="平台名称"  name="name">
		</div>
    </div>
    
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">平台接口商户ID：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  value="" placeholder="平台接口商户ID"  name="app_id">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">平台接口商户秘钥：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="平台接口商户秘钥"  name="secret">
		</div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">安卓app监控秘钥：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" placeholder="安卓app监控秘钥"  name="android_secret">
        </div>
    </div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">平台管理后台登录域名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="http://www.test.com"  name="admin_url">
		</div>
    </div>
	<!-- <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div> -->
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>
@endsection
@section('js')
<script>
$('form').on('submit',function(evt){
    evt.preventDefault();
    var data = $(this).serialize();
    //ajax
    $.ajax({
        url:'/admin/platform',
        data:data,
        type:'post',
        dataType:'json',
        headers:{
            'X-CSRF-TOKEN':"{{csrf_token()}}"
        },
        success:function(res){
			if(res.code == 422){
				layer.msg(res.msg)
			}
			if(res.code == 0){
				layer.msg(res.msg)
			}
			if(res.code == 1){
				layer.alert(res.msg,function(){
					parent.self.location = parent.self.location;
				})
			}
        }
    })
})
</script>
@endsection