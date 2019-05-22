@extends('admin/common/master')
@section('title','管理员列表')
@section('content')
<link rel="stylesheet" href="/admin/page.css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span> {{$nav[0]}} <span class="c-gray en">&gt;</span> {{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form>
    <div class="text-c">
        <span class="select-box inline">
            <select name="r_id" class="select" style="width:220px;">
                <option value="0">全部平台</option>
                <option value="1">分类一</option>
                <option value="2">分类二</option>
            </select>
        </span>
        <input type="text" name="mg_name"  placeholder=" 管理员" style="width:250px" class="input-text">
		<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l">
        <a href="javascript:;" onclick="setpwd('修改密码','/admin/manager/setpwd')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe63f;</i> 修改密码</a> 
        <a href="javascript:;" onclick="add('添加管理员','/admin/manager/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
    </span>
     <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="10">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="120">登录名</th>
				<th width="90">角色</th>
				<th width="90">平台</th>
				<th width="150">最后登录时间</th>
				<th width="100">登录次数</th>
				<th>备注</th>
				<th width="130">创建时间</th>
				<th width="100">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($managers as $v)
			<tr class="text-c">
				<td>{{$v->mg_id}}</td>
				<td>{{$v->mg_name}}</td>
				<td>{{$v->roles->r_name}}</td>
				<td><span class="label label-warning radius">{{$v->platform->name}}</span></td>
				<td>{{$v->last_time}}</td>
				<td>{{$v->login_counts}}</td>
				<td>{{$v->desc}}</td>
				<td>{{$v->created_at}}</td>
				<td class="td-status">{!! CommonStatus($v->status) !!}</td>
				<td class="td-manage"><a title="编辑" href="javascript:;" onclick="edit('管理员编辑','/admin/manager/{{$v->mg_id}}/edit','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="del(this,'{{$v->mg_id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<span class="r">
		{{ $managers->appends(['mg_name'=>$whereData['mg_name'],'r_id'=>$whereData['r_id']])->links() }}
	</span>
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
			url: '/admin/manager/'+id,
			dataType: 'json',
			headers:{
				'X-CSRF-TOKEN':"{{csrf_token()}}"
			},
			success: function(res){
				if(res.code == 1){	
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}
				if(res.code == 422){
					layer.msg(res.msg)
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

$('.reset').on('click',function(){
	var status = $(this).attr('data')
	var mg_id = $(this).parents('tr').find('td:eq(0)').text()
	//ajax
	$.ajax({
		url:'/admin/manager/reset',
		data:{status:status,mg_id:mg_id},
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

function setpwd(title,url){
	layer.open({
			type: 2,
			area: ['500px', '300px'],
			fix: false, //不固定
			maxmin: true,
			shade:0.4,
			title: title,
			content: url
		});
}
</script>
@endsection