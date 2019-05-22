@extends('admin/common/master')
@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span> {{$nav[0]}} <span class="c-gray en">&gt;</span> {{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="add('添加权限','/admin/permission/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加权限</a></span> <span class="r">共有数据：<strong>{{count($Ptree)}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">权限列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="150">权限名</th>
				<th width="100">控制器</th>
				<th width="100">方法</th>
				<th>路由</th>
				<th width="130">层级</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Ptree as $v)
			<tr class="text-c">
				<td>{{$v['p_id']}}</td>
				<td class="text-l">{{str_repeat('&nbsp;&nbsp;├─',$v['ps_level']).$v['p_name']}}</td>
				<td>{{$v['p_c']}}</td>
				<td>{{$v['p_a']}}</td>
				<td>{{$v['ps_route']}}</td>
				<td class="td-status">{!! ps_level($v['ps_level']) !!}</td>
				<td class="td-manage"><a title="编辑" href="javascript:;" onclick="edit('权限编辑','/admin/permission/{{$v['p_id']}}/edit','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="del(this,'{{$v['p_id']}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('js')
<script>
function add(title,url,w,h){
	layer_show(title,url,w,h);
}

function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/admin/permission/'+id,
			dataType: 'json',
			headers:{
				'X-CSRF-TOKEN':"{{csrf_token()}}"
			},
			success: function(res){
				if(res.code == 1){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}
				if(res.code == 0){
					layer.msg(res.msg)
				}
			}
		});		
	});
}

function edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
@endsection
