@extends('admin/common/master')
@section('title','添加管理员')
@section('content')
<article class="page-container">
	<form class="form form-horizontal">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">管理员：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="输入管理员账号"  name="mg_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">初始密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" placeholder="输入初始密码" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" placeholder="输入确认密码" name="password_confirmation">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="status" type="radio" id="sex-1" checked value="1">
					<label for="sex-1">开启</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="status" value="2">
					<label for="sex-2">关闭</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属角色：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="r_id" size="1">
					@foreach($roles as $v)
					<option value="{{$v->r_id}}">{{$v->r_name}}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">属于平台：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="pl_id" size="1">
					@foreach($platform as $v)
						<option value="{{$v->pl_id}}">{{$v->name}}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="desc"  class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
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
		url:'/admin/manager',
		data:data,
		dataType:'json',
		type:'post',
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