<?php
namespace Suxianjia\xianjiamessagepush\http;
// request response
class MyResponse
{
    public static function success($data = [], $message = 'Success', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public static function error($message = 'Error', $code = 500)
    {
        return response()->json([
            'status' => 'error',
            'code' => $code,
            'message' => $message,
        ]);
    }
}