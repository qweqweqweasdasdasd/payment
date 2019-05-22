@extends('admin/common/master')
@section('title','支付产品列表')
@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span> {{$nav[0]}} <span class="c-gray en">&gt;</span> {{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	<a href="javascript:;" onclick="add('添加支付产品','/admin/payproduct/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加支付产品</a></span> 
	 <span >添加了产品之后配置收款账号,循环到达设置的要求之后,按照支付列表一个一个调用账号的</span> 
	<span class="r">共有数据：<strong>{{$payproducts->count()}}</strong> 条</span> 
 </div>
	<div class="">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="50">排序</th>
					<th width="100">支付产品名称</th>
					<th width="120">Icon</th>
					<th >描述</th>
                   
                    <th width="180">循环方式</th>
                    
					<th width="60">状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($payproducts as $k=>$v)
				<tr class="text-c">
					<td width="70"><input type="text" value="{{$v->sort_id}}" class="input-text radius size-MINI" style="text-align:center"></td>
                    <td>{{$v->pay_name}}</td>
                    <td ><img src="{{config('code.payicon.'.$k.'.1')}}" width="70"></td>
                    <td>{{$v->desc}}</td>
					
					<td>{!! circulation_show($v->roll_id,$v->roll_range) !!}</td>
					<td class="td-status" p_id="{{$v->p_id}}">{!! CommonStatus($v->status) !!}</td>
					<td class="f-14 td-manage">
						
                        <a style="text-decoration:none" class="ml-5" onClick="edit('产品编辑','/admin/payproduct/{{$v->p_id}}/edit ','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        <a style="text-decoration:none" class="ml-5" onClick="del(this,'{{$v->p_id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('js')
<script>
$('.reset').on('click',function(){
	var status = $(this).attr('data')
	var p_id = $(this).parent('td').attr('p_id')
	//debugger;
	//ajax
	$.ajax({
		url:'/admin/payproduct/reset',
		data:{status:status,p_id:p_id},
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
/*管理员-增加*/
function add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/admin/payproduct/' + id,
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

/*管理员-编辑*/
function edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
@endsection
