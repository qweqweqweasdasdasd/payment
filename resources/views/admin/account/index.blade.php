@extends('admin/common/master')
@section('title','账号列表')
@section('content')
<link rel="stylesheet" href="/admin/page.css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span> {{$nav[0]}} <span class="c-gray en">&gt;</span> {{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form>
        <span class="select-box inline"> 
		<select name="pl_id" class="select" style="width:150px;">
			<option value="">请选择使用平台</option>
			@foreach($platformIdAndName as $k=>$v)
            <option value="{{$k}}" @if($whereData['pl_id'] == $k) selected @endif>&nbsp;&nbsp;{{$v}}</option>
			@endforeach
		</select>
		</span>
	    <span class="select-box inline">
		<select name="p_id" class="select" style="width:180px;">
			<option value="">请选择银行卡账号</option>
			@foreach($payproductIdAndName as $k=>$v)
            <option value="{{$k}}" @if($whereData['p_id'] == $k) selected @endif>&nbsp;&nbsp;{{$v}}</option>
			@endforeach
		</select>
		</span>
        <input type="text" name="account_num"  placeholder="输入账号" style="width:250px" class="input-text" value="{{$whereData['account_num']}}">
		<button  class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜账号</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="add('添加账号','/admin/account/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加账号</a></span> <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="50">ID</th>
					<th width="100">平台</th>
					<th width="150">产品</th>
					<th width="120">户名</th>
					<th>账号</th>
					<th width="150">创建时间</th>
					<th width="100">余额</th>
                    <th width="100">是否当前</th>
					<th width="100">状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($account as $k=>$v)
				<tr class="text-c">
					<td>{{$v->pa_id}}</td>
					<td>{{$v->platform->name}}</td>
					<td>{{$v->payproduct->pay_name}}</td>
					<td>{{$v->account_name}}</td>
					<td>{{$v->account_num}}</td>
					<td>{{$v->created_at}}</td>
					<td>{{$v->balance}}</td>
                    <td>{!! CommonAccountStatus($v->activing) !!}</td>
					<td class="td-status" pa_id="{{$v->pa_id}}">{!! CommonStatus($v->status) !!}</td>
					<td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="edit('账号编辑','/admin/account/{{$v->pa_id}}/edit','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        <a style="text-decoration:none" class="ml-5" onClick="del(this,'{{$v->pa_id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $account->appends(['pl_id'=>$whereData['pl_id'],'p_id'=>$whereData['p_id'],'account_num'=>$whereData['account_num']])->links() }}
	</div>
</div>
@endsection
@section('js')
<script>
$('.reset').on('click',function(){
	var status = $(this).attr('data')
	var pa_id = $(this).parent('td').attr('pa_id')
	
	//ajax
	$.ajax({
		url:'/admin/account/reset',
		data:{status:status,pa_id:pa_id},
		dataType:'json',
		type:'post',
		headers:{
			'X-CSRF-TOKEN':"{{csrf_token()}}"
		},
		success:function(res){
			if(res.code == 422){
				layer.msg(res.msg)
			}
			if(res.code == 1){
				self.location.href = self.location.href;
			}
			if(res.code == 0){
				layer.msg(res.msg)
			}
		}
	})
})
//添加账号
function add(title,url,w,h){
	layer_show(title,url,w,h);
}
//删除账号
function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/admin/account/' + id,
			dataType: 'json',
			headers:{
				'X-CSRF-TOKEN':'{{csrf_token()}}'
			},
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
//编辑账号
function edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
@endsection