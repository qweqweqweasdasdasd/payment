@extends('admin/common/master')
@section('title','重置密码')
@section('content')
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-3 col-sm-2">管理员：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:300px;">
			<select class="select" name="mg_id" size="1">
                @foreach($managers as $v)
				<option value="{{$v->mg_id}}">{{$v->mg_name}}</option>
				@endforeach
			</select>
			</span>
        </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-3 col-sm-2">重置密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="" placeholder="请输入密码"  name="password">
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-3 col-sm-offset-2">
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
            url:'/admin/manager/setpwd',
            data:data,
            type:'post',
            dataType:'json',
            headers:{
                'X-CSRF-TOKEN':"{{csrf_token()}}"
            },
            success:function(res){
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