@extends('admin/common/master')
@section('title','添加账号')
@section('content')
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
    <input type="hidden" name="pa_id" value="{{$account->pa_id}}">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">平台ID：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:200px;">
			<select class="select" name="pl_id" size="1">
                @foreach($platform as $k=>$v)
				<option value="{{$k}}" @if($account->pl_id == $k) selected @endif>{{$v}}</option>
				@endforeach
			</select>
			</span> </div>
	</div>

    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">产品ID：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:200px;">
			<select class="select" name="p_id" size="1">
                @foreach($payproduct as $k=>$v)
				<option value="{{$k}}" @if($account->p_id == $k) selected @endif>{{$v}}</option>
				@endforeach
			</select>
			</span> </div>
	</div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">收款户主：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  value="{{$account->account_name}}" placeholder="输入收款户主" name="account_name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">收款银行卡：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  value="{{$account->account_num}}" placeholder="输入收款银行卡"  name="account_num">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">余额：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$account->balance}}" placeholder="请输入余额"  name="balance">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">状态：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="status" type="radio" id="sex-1" value="1" @if($account->status == 1) checked @endif>
				<label for="sex-1">启用</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="status" value="2" @if($account->status == 2) checked @endif>
				<label for="sex-2">停用</label>
			</div>
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
        var pa_id = $('input[type="hidden"]').val();
        //debugger;
        //ajax
        $.ajax({
            url:'/admin/account/' + pa_id,
            data:data,
            dataType:'json',
            type:'PATCH',
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