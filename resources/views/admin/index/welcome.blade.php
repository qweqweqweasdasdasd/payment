@extends('admin/common/master')
@section('title','welcome')
@section('content')
<div class="page-container">
	<p class="f-20 text-success"> 欢迎使用--{{env('APP_NAME')}}</p>
	<p>登录次数：{{$manager->login_counts}} </p>
	<p>上次登录IP：{{$manager->ip}}  上次登录时间：{{$manager->last_time}}</p>
	<div class="btn-group">
		<span class="btn btn-primary ">今天</span>
		<span class="btn btn-default ">昨天</span>
		<span class="btn btn-default ">本月</span>
		<span class="btn btn-default ">上月</span>
	</div>
	<table class="table table-border table-bordered table-bg mt-10">
		<thead>
			<tr>
				<th colspan="7" scope="col">金额统计: </th>
			</tr>
			<tr class="text-c">
				<th>使用平台</th>
				<th>银行卡收款</th>
				<th>微信商户号</th>
				<th>支付宝扫码</th>
				<th>支付宝H5</th>
				
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>辉煌</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				
			</tr>
			<tr class="text-c">
				<td>熊猫</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				
			</tr>
			<tr class="text-c">
				<td>奔驰</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				
			</tr>
			<tr class="text-c">
				<td>宝马</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				
			</tr>
            <tr class="text-c">
				<td>辉煌2</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				
			</tr>
			<tr class="text-c">
				<td>赛马会</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				
			</tr>
          
		</tbody>
	</table>
</div>
@endsection