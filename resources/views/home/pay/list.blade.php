@extends('admin/common/master')
@section('title','支付列表')
@section('content')
<style>
    .center{
        text-align: center;
    }
</style>
<article class="page-container">
<div class="panel panel-default">
	<div class="panel-header center">{{$platform->name}}--支付宝支付</div>
	<div class="panel-body">
        <form class="form form-horizontal" >
            {{ csrf_field() }}
           <input type="hidden" name="pl_id" value="{{$platform->pl_id}}">

            <div class="row cl">
                <div class="formControls col-xs-12 col-sm-12"> <span class="select-box">
                    <select name="pay_way" class="select" id="select">
                        <option value="0">请选择支付方式</option>
                        @foreach($platformWithPayproduct as $v)
                        <option value="{{$v->pay_type}}-{{$v->p_id}}">&nbsp;&nbsp;{{$v->pay_name}}</option>
                        @endforeach
                    </select>
                    </span> 
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-12 col-sm-12">
                    <input type="username" class="input-text"  value="" placeholder="请输入会员账号"  name="username">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-12 col-sm-12">
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" checked value="100">
                        <label for="radio-1">100&nbsp; 元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="300">
                        <label for="radio-1">300&nbsp; 元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="500">
                        <label for="radio-1">500&nbsp; 元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="800">
                        <label for="radio-1">800&nbsp; 元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="1000">
                        <label for="radio-1">1000元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="2000">
                        <label for="radio-1">2000元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="3000">
                        <label for="radio-1">3000元</label>
                    </div>
                    <div class="check-box">
                        <input type="radio" id="radio-1" name="pay_amount" value="5000">
                        <label for="radio-1">5000元</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-12 col-sm-12"> 
                    
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-12 col-sm-12">
                    <button type="submit"  id="submit" class="btn btn-block btn-warning radius" ><i class="icon-ok"></i> 结算</button>
                </div>
            </div>
        </form>
    </div>
       
    </article>
</div>
@endsection
@section('js')
<script>
//选择合适的平台获取到收款账号
$('#select').change(function(){
    //ajax
    var p_id = $(this).find('option:selected').val();
    var pl_id = $('input[name="pl_id"]').val();
    $.ajax({
        url:'/pay/list2',
        data:{p_id:p_id,pl_id:pl_id},
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

                debugger;
            }
        }
    })
})

//支付结算
$('form').on('submit',function(evt){
        evt.preventDefault();
        var data = $(this).serialize();

        //ajax
        $.ajax({
            url:'/pay/jiesuan',
            data:data,
            dataType:'json',
            type:'post',
            success:function(res){
                if(res.code == 422){
                    layer.msg(res.msg)
                }
                if(res.code == 0){
                    layer.msg(res.msg)
                }
                if(res.code == 1){
                    window.location.href = res.herf;
                }

            }
        })
    });
</script>
@endsection
