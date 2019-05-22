@extends('admin/common/master')
@section('title','平台列表')
@section('content')
<link rel="stylesheet" href="/admin/page.css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span> {{$nav[0]}} <span class="c-gray en">&gt;</span> {{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c">
		<input type="text" name="" id="" placeholder=" 平台名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜平台</button>
	</div> -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a class="btn btn-primary radius" data-title="添加平台" data-href="article-add.html" onclick="add('添加平台','/admin/platform/create','800','500')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加平台</a> 接口信息和免签秘钥设置</span> <span class="r">共有数据：<strong>{{$platform->count()}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="50">ID</th>
					<th width="80">平台名称</th>
					<th width="250">下属管理员</th>
					<th width="150">接口商户号</th>
					<th width="250">接口商户秘钥</th>
					<th width="150">安卓app监控秘钥</th>
                    <th >(模拟)平台管理后台域名</th>
                    
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($platform as $v)
				<tr class="text-c">
					<td>{{$v->pl_id}}</td>
					<td>{{$v->name}}</td>
					<td>
						@foreach($v->managers as $vv)
							{{$vv->mg_name}} 
						@endforeach
					</td>
					<td>{{$v->app_id}}</td>
					<td>{{$v->secret}}</td>
					<td>{{$v->android_secret}}</td>
					<td><a target="_blank" href="{{$v->admin_url}}">{{$v->admin_url}}</a></td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="disaccount('分配支付方式','/admin/platform/disaccount/{{$v->pl_id}}','10001')" href="javascript:;" title="分配支付方式"><i class="Hui-iconfont">&#xe667;</i></a> 
						<a style="text-decoration:none" class="ml-5" onClick="edit('平台编辑','/admin/platform/{{$v->pl_id}}/edit','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a style="text-decoration:none" class="ml-5" onClick="del(this,'{{$v->pl_id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $platform->links() }}
	</div>
</div>
@endsection
@section('js')
<script>
/*平台-增加*/
function add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*平台-删除*/
function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/admin/platform/'+id,
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

/*平台-分配支付方式*/
function disaccount(title,url,id,w,h) {
	layer_show(title,url,w,h);
}
/*平台-编辑*/
function edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

</script>
@endsection