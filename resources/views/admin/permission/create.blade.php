@extends('admin/common/master')
@section('title','权限')
@section('content')
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">权限名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="请输入权限" name="p_name">
		</div>
	</div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">父级：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="p_pid" size="1">
				<option value="0">/</option>
				@foreach($Ptree as $v)
				<option value="{{$v['p_id']}}">{{str_repeat('&nbsp;&nbsp;├─',$v['ps_level']).$v['p_name']}}</option>
				@endforeach
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">控制器：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  value="" placeholder="请输入控制器"  name="p_c">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">方法：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"   placeholder="请输入方法"  name="p_a">
		</div>
	</div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">路由：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"   placeholder="请输入路由" name="ps_route">
		</div>
	</div>
	<!-- <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">是否显示：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="show" type="radio" id="sex-1" checked>
				<label for="sex-1">显示</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="show">
				<label for="sex-2">关闭</label>
			</div>
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
        url:'/admin/permission',
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