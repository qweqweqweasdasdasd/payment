@extends('admin/common/master')
@section('title','产品管理')
@section('content')
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">序列号：</label>
		<div class="formControls col-xs-8 col-sm-9" >
			<input type="number" class="input-text" value="100"  step="100" min="0" max="2000" name="sort_id" style="width:150px;">
		</div>
    </div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">产品名称：</label>
		<div class="formControls col-xs-8 col-sm-9" >
			<input type="text" class="input-text" placeholder="请输入产品的名称" value="" name="pay_name" >
		</div>
    </div>
		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">支付英文标识：</label>
		<div class="formControls col-xs-8 col-sm-9" >
			<input type="text" class="input-text" placeholder="请输入支付英文" value="" name="pay_type" >
		</div>
    </div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">产品图片：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:200px;">
			<select class="select" name="pay_icon" size="1">
                @foreach(config('code.payicon') as $k=>$v)
				<option value="{{$k}}">{{$v[0]}}</option>
				@endforeach
			</select>
			</span> </div>
    </div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">循环方式：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:200px;">
			<select class="select" name="roll_id" size="1" id="roll_id">
        <option value="0">第一个账号</option>
				<option value="1">达到支付次数(max)切换</option>
				<option value="2">达到时间间隔(max)切换</option>
				<option value="3">达到收款金额(max)切换</option>
			</select>
            </span> 
            <span id="content">配置多个收款账号的时候选择合适的循环方式</span>  
        </div>
    </div>

    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">状态：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="status" type="radio" id="sex-1" checked value="1"> 
				<label for="sex-1">使用</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="status" value="2">
				<label for="sex-2">停用</label>
			</div>
		</div>
    </div>
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="desc" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" ></textarea>
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
		//提交
		$('form').on('submit',function(evt){
			evt.preventDefault();
			var data = $(this).serialize();
			//ajax
			$.ajax({
				url:'/admin/payproduct',
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
		//选择循环方式
    $('#roll_id').on('change',function(){
        var value = $(this).find("option:selected").val();
        var text = $(this).find("option:selected").text();
        var unit = '';
        var content = '<input type="number" class="input-text"  name="roll_range">';
        //debugger;
        switch (value) {
            case '1':
                unit = '次数';
                $('#content').html(content+'&nbsp;'+unit)
                break;
            case '2':
                unit = '分钟';
                $('#content').html(content+'&nbsp;'+unit)
                break;
            case '3':
                unit = '元';
                $('#content').html(content+'&nbsp;'+unit)
                break;
        }
    })
</script>
@endsection