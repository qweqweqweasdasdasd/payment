<?php 
//公共方法设置状态
function CommonStatus($code)
{
    switch ($code) {
        case '1':
            return '<input class="btn btn-success size-S radius reset" data="2" type="button" value="开启">';
        case '2':
            return '<input class="btn btn-default size-S radius reset" data="1" type="button" value="关闭">';
    }
}

//公共方式设置状态
function CommonShowStatus($code)
{
    switch ($code) {
        case '1':
            return '<span class="badge badge-success radius">开启</span>';
        case '2':
            return '<span class="badge badge-default radius">关闭</span>';
    }
}

//公共方法显示使用的收款账号
function CommonAccountStatus($code)
{
    switch ($code) {
        case '1':
            return '<span class="badge badge-success radius">当前</span>';
        case '2':
            return '<span class="badge badge-default radius">非当前</span>';
    }
}

//公共方法订单状态显示
function CommonOrderStatus($code)
{
    switch ($code) {
        case '1':
            return '<span class="label label-default radius">下单成功</span>';
        case '2':
            return '<span class="label label-secondary radius">支付成功</span>';
        case '3':
            return '<span class="label label-success radius">上分成功</span>';
        case '4':
            return '<span class="label label-warning radius">上分失败</span>';
    }
}

//公共方法设置层级
function ps_level($code)
{
    switch ($code) {
        case '0':
            return '<span class="label label-default radius">顶级权限</span>';
        case '1':
            return '<span class="label label-success radius">一级权限</span>';
        case '2':
            return '<span class="label label-primary radius">二级权限</span>';
        case '3':
            return '<span class="label label-warning radius">三级权限</span>';
    }
}

//循环方式自定义
function circulation_show($roll_id,$roll_range)
{
    switch ($roll_id) {
        case '0':
            return '<span class="label label-default radius">'.'第一个账号'.$roll_range.'</span>';
        case '1':
            return '<span class="label label-default radius">达到支付次数( '.$roll_range.' )切换</span>';
        case '2':
            return '<span class="label label-default radius">达到时间间隔( '.$roll_range.' )切换</span>';
        case '3':
            return '<span class="label label-default radius">达到收款金额( '.$roll_range.' )切换</span>';
        
    }
}

//递归方式获取上下级权限信息
function generateTree($data){
    $items = array();
    foreach($data as $v){
        $items[$v['p_id']] = $v;
    }
    $tree = array();
    foreach($items as $k => $item){
        if(isset($items[$item['p_pid']])){
            $items[$item['p_pid']]['son'][] = &$items[$k];
        }else{
            $tree[] = &$items[$k];
        }
    }
    return getTreeData($tree);
}
function getTreeData($tree,$level=0){
    static $arr = array();
    foreach($tree as $t){
        $tmp = $t;
        unset($tmp['son']);
        //$tmp['level'] = $level;
        $arr[] = $tmp;
        if(isset($t['son'])){
            getTreeData($t['son'],$level+1);
        }
    }
    return $arr;
}
/**
 * 获取当前控制器名
 */
function getCurrentControllerName()
{
    return getCurrentAction()['controller'];
}
/**
 * 获取当前方法名
 */
function getCurrentMethodName()
{
    return getCurrentAction()['method'];
}
/**
 * 获取当前控制器与操作方法的通用函数
 */
function getCurrentAction()
{
    $action = \Route::current()->getActionName();
    //dd($action);exit;
    //dd($action);
    //return $action;
    list($class, $method) = explode('@', $action);
    //$classes = explode(DIRECTORY_SEPARATOR,$class);
    $class = str_replace('Controller','',substr(strrchr($class,'\\'),1));
    return ['controller' => $class, 'method' => $method];
}