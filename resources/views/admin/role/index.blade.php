@extends('admin/common/master')
@section('title','用户组')
@section('content')
<link rel="stylesheet" href="/admin/page.css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span> {{$nav[0]}} <span class="c-gray en">&gt;</span> {{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form>
	<div class="text-c"> 角色查询：
		<input type="text" class="input-text" style="width:250px" placeholder="输入角色名称"  name="r_name" value="{{$dataWhere['r_name']}}">
		<button type="submit" class="btn btn-success" ><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="add('添加角色','/admin/role/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a></span> <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">角色列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="100">角色名称</th>
				<th width="280">管理员</th>
				<th>备注</th>
				<!-- <th width="100">状态</th> -->
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $v)
			<tr class="text-c">
				<td>{{$v->r_id}}</td>
				<td>{{$v->r_name}}</td>
				<td>
				@foreach($v->managers as $vv)
					{{$vv->mg_name}}
				@endforeach
				</td>
				<td>{{$v->desc}}</td>
				<!-- <td class="td-status">{!! CommonStatus($v->status) !!}</td> -->
				<td class="td-manage">
					<a style="text-decoration:none" onclick="dis('分配权限','/admin/role/distribute/{{$v->r_id}}','800','500')" href="javascript:;" title="分配权限"><i class="Hui-iconfont">&#xe667;</i></a> <a title="编辑" href="javascript:;" onclick="edit('角色编辑','/admin/role/{{$v->r_id}}/edit','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				 	<a title="删除" href="javascript:;" onclick="del(this,'{{$v->r_id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<span class="r">
	{{ $roles->links() }}
	</span>
</div>
@endsection
@section('js')
<script>
function dis(title,url,w,h){
	layer_show(title,url,w,h);
}

function add(title,url,w,h){
	layer_show(title,url,w,h);
}

$('input[name="r_name"]').on('click',function(){
	$(this).val('')
});

function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/admin/role/'+id,
			dataType: 'json',
			headers:{
				'X-CSRF-TOKEN':"{{csrf_token()}}"
			},
			success: function(res){
				if(res.code == 422){
					layer.msg(res.msg)
				}
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

//设置角色的状态
$('.reset').on('click',function(){
	var status = $(this).attr('data');
	var id = $(this).parents('tr').find('td:eq(0)').text();
	//ajax
	$.ajax({
		url:'/admin/role/reset',
		data:{status:status,id:id},
		type:'post',
		dataType:'json',
		headers:{
			'X-CSRF-TOKEN':'{{csrf_token()}}'
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

function edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

</script>
@endsection