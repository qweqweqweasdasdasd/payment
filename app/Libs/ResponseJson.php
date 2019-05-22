<?php 

namespace App\Libs;

/**
 * 封装json返回数据格式
 */
trait ResponseJson
{
    //返回错误码和错误信息
    public function JsonData($code,$msg,$data=[])
    {
        return $this->JsonResponse($code,$msg,$data);
    }

    //返回成功的数据
    public function SuccessJsonResponse($data)
    {
        return $this->JsonResponse($code = 0,$msg = 'success',$data);
    }

    public function JsonResponse($code,$msg,$data)
    {
        $content = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];

        return json_encode($content);
    }
}

