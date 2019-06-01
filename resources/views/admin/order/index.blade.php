@extends('admin/common/master')
@section('title','订单管理')
@section('content')
<link rel="stylesheet" href="/admin/page.css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> home <span class="c-gray en">&gt;</span>{{$nav[0]}} <span class="c-gray en">&gt;</span>{{$nav[1]}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form>
	<div class="text-c">
	    <span class="select-box inline">
		<select name="pl_id" class="select" style="width:150px;">
			<option value="">请选择使用平台</option>
            @foreach($platformIdAndName as $k=>$v)
            <option value="{{$k}}" @if($k == $whereData['pl_id']) selected @endif>{{$v}}</option>
			@endforeach
		</select>
        </span> 
        <span class="select-box inline">
		<select name="p_id" class="select" style="width:150px;">
			<option value="">请选择支付方式</option>
            @foreach($payproductIdAndName as $k=>$v)
            <option value="{{$k}}" @if($k == $whereData['p_id']) selected @endif>{{$v}}</option>
			@endforeach
		</select>
        </span>
        日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:180px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:180px;">
		<input type="text" name="username"  placeholder="会员账号" style="width:250px" class="input-text">
		<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 查询</button>
    </div>
    </form>
	<div class="cl pd-5 bg-1 bk-gray mt-10"> 
        <span class="l">状态注释:: 1,下单成功==生成了订单(未支付) 2,支付成功==转账成功未上分到平台 3,上分成功==支付成功并且上分到平台 4,上分失败==因某些原因导致上分失败,可选择补单</span> <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
	<div class="mt-10">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
                    <th width="50">ID</th>
                    <th width="100">用户</th>
                    <th width="100">平台</th>
                    <th width="120">支付方式</th>
					<th width="100">签约金额</th>
					<th width="100">免签金额</th>
					<th >订单号</th>
					<th >姓名--收款账号--状态</th>
                    <th>下单时间</th>
                    <th width="80">发布状态</th>
					<th width="90">操作</th>
				</tr>
			</thead>
			<tbody>
                @foreach($order as $v)
				<tr class="text-c">
                    <td>{{$v->o_id}}</td>
                    <td>{{$v->u_id}}</td>
                    <td>{{$v->platform->name}}</td>
                    <td>{{$v->payproduct->pay_name}}</td>
					<td>{{$v->order_amount}}-元</td>
					<td>{{$v->real_amount}}-元</td>
					<td>{{$v->order_no}}</td>
					<td>{{$v->account->account_name}}--{{$v->account->account_num}}--@if($v->account->status == 1) 开启 @elseif($v->account->status == 2) 停用 @endif</td>
                    <td>{{$v->created_at}}</td>
                    <td>{!! CommonOrderStatus($v->status) !!}</td>
					<td class="f-14 td-manage">
                        <a style="text-decoration:none" class="btn btn-success radius " onClick="article_edit('补单','article-add.html','10001')" href="javascript:;" title="补单">补单</a></td>
				</tr>
				@endforeach
			</tbody>
        </table>
        {{$order->appends(['pl_id'=>$whereData['pl_id'],'p_id'=>$whereData['p_id']])->links()}}
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('/admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script> 

@endsection