@extends('admin/common/master')
@section('title','角色')
@section('content')
<article class="page-container">
	<form class="form form-horizontal" >
    {{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="输入角色的名称"  name="r_name">
			</div>
		</div>
        <!-- <div class="row cl">
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
        </div> -->
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="desc" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
        </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
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
            url:'/admin/role',
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
                    layer.alert(res.msg,function(){
                        parent.self.location = parent.self.location;
                    })
                }

            }
        })
    });
</script>
@endsection
