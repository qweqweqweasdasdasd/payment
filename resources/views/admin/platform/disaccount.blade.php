@extends('admin/common/master')
@section('title','分配支付方式')
@section('content')
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
        <input type="hidden" name="pl_id" value="{{$platform->pl_id}}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">平台名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$platform->name}}" readonly="readonly">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"></label>
			<div class="formControls col-xs-8 col-sm-9">
				<dl class="permission-list">
					<dt>
                        如何需要关闭平台使用该方式,取消勾选
					</dt>
					<dd>
                        @foreach($payproduct as $v)
						<dl class="cl permission-list2">
							<dt>
								<label class="" p_id="{{$v->p_id}}">
									<input type="checkbox" value="{{$v->p_id}}"  name="dis[]" @if(in_array($v->p_id,$payproductsArr)) checked @endif>
									{{$v->pay_name}}&nbsp;&nbsp;&nbsp;{!!CommonShowStatus($v->status)!!}</label>
							</dt>
							<dd>
								<!-- <label class="">
									<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-0">
									添加</label> -->		
							</dd>
						</dl>
						@endforeach
					</dd>
				</dl>
				
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
//修改支付产品状态
// $('.reset').on('click',function(){
// 	var status = $(this).attr('data')
// 	var p_id = $(this).parent('label').attr('p_id')
// 	//debugger;
// 	//ajax
// 	$.ajax({
// 		url:'/admin/payproduct/reset',
// 		data:{status:status,p_id:p_id},
// 		dataType:'json',
// 		type:'post',
// 		headers:{
// 			'X-CSRF-TOKEN':"{{csrf_token()}}"
// 		},
// 		success:function(res){
// 			if(res.code == 422){
// 				layer.msg(res.msg)
// 			}
// 			if(res.code == 1){
// 				self.location.href = self.location.href;
// 			}
// 			if(res.code == 0){
// 				layer.msg(res.msg)
// 			}
// 		}
// 	})
// })
//提交保存数据
$('form').on('submit',function(evt){
    evt.preventDefault();
    var pl_id = $('input[type="hidden"]').val()
    var data = $(this).serialize();
    
    //ajax
    $.ajax({
        url:'/admin/platform/disaccount/'+pl_id,
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