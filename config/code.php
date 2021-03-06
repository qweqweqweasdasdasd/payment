<?php

return [
    'resource' => [
        'success' => 1,
        'error'   => 0
    ],
    'payicon' => [
        ['AlipayToBank',''],
        ['WeChat','']
    ],
    'msg' => [
        '1000' => '管理员状态为关闭,请联系技术qq:498224218',
        '1001' => '账号或者密码不对!',
        '1002' => '欢迎登录' . env('APP_NAME'),
        '2000' => '添加角色成功',
        '2001' => '添加角色失败',
        '2002' => '更新角色成功',
        '2003' => '更新角色失败',
        '2004' => '删除角色成功',
        '2005' => '删除角色失败',
        '2006' => '角色下面有管理员,无法删除',
        '2007' => '更新角色状态成功',
        '2008' => '更新角色状态失败',
        '3000' => '管理员创建成功',
        '3001' => '管理员创建失败',
        '3002' => '管理员状态修改成功',
        '3003' => '管理员状态修改失败',
        '3004' => '管理员编辑成功',
        '3005' => '管理员编辑失败',
        '3006' => '管理员删除成功',
        '3007' => '管理员删除失败',
        '3008' => '管理员名称或者密码不得为空',
        '3009' => '管理员密码更新成功',
        '3010' => '管理员密码更新失败',
        '4000' => '权限保存成功',
        '4001' => '权限保存失败',
        '4002' => '权限编辑成功',
        '4003' => '权限编辑失败',
        '4004' => '权限删除成功',
        '4005' => '权限有子权限',
        '5000' => '平台保存成功',
        '5001' => '平台保存失败',
        '5002' => '平台编辑成功',
        '5003' => '平台编辑失败',
        '5004' => '平台删除成功',
        '5005' => '平台删除失败',
        '5006' => '更新平台和支付方式关系表成功',
        '5007' => '更新平台和支付方式关系表失败',
        '6000' => '支付产品创建成功',
        '6001' => '支付产品创建失败',
        '6002' => '支付产品修改状态成功',
        '6003' => '支付产品硒鼓状态失败',
        '6004' => '支付宝编辑成功',
        '6005' => '支付宝编辑失败',
        '7001' => '收款账号创建成功',
        '7002' => '收款账号创建失败',
        '7003' => '收款账号状态设置成功',
        '7004' => '收款账号状态设置失败',
        '7005' => '收款账号编辑成功',
        '7006' => '收款账号编辑失败',

        // 接口返回错误信息
        '10000' => '平台id或者支付方式id不得为空为零!',
        '10001' => '下单保存数据库成功!',
        '10002' => '下单保存数据库失败!',
        '10003' => '该支付方式没有设置对应的收款账号',

        // 支付错误信息
        '20000' => '不支持当前使用的支付方式'
    ]
];
