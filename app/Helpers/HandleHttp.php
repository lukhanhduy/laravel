<?php
class HandleHttp{
    public static function responseSuccess($response)
	{
		$code = empty($response['code'])?200:$response['code'];
		$data = !isset($response['data'])?null:$response['data'];
		$message = empty($response['message'])?null:$response['message'];
		$result = [
			'data' => $data,
			'code' => $code,
			'message' => $message
		];
		if(isset($response["options"])){
			foreach ($options as $key => $value) {
				$result[$key] = $value;
			}
		}
		return response($result, $code);
    }
    public static function responseError($response)
	{
		$code = empty($response['code'])?500:$response['code'];
		$data = !isset($response['data'])?null:$response['data'];
		$message = empty($response['message'])?null:$response['message'];
		$errors = empty($response['errors'])?null:$response['errors'];
        $params = [
			'errors' => $errors,
			'data' => $data,
			'code' => $code,
			'message' => $message
		];
		return response($params, $code);
	}
}