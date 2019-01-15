<?php
class HandleHttp{
    public static function responseSuccess($response)
	{
        $params = array('data' => $response['data'],
						'code' => $response['code'],
						'message' => $response['message']);
		return response($params, $code);
    }
    public static function responseError($response)
	{
        $params = array('errors' => $response['errors'],
                        'data' => $response['data'],
						'code' => $response['code'],
						'message' => $response['message']);
		return response($params, $code);
	}
}