<?php

if (!function_exists("SayHello")) {

	function sayHello($name)
	{
		return "Hello $name";
	}
}

function sendSuccessResponse($result, $message, $code = 200)
{
    $response = [
        'success' => true,
        'code' => $code,
        'message' => $message,
        'data' => $result,
    ];

    return response()->json($response, $code);
}

function sendErrorResponse($error, $errorMessage = [], $code = 404)
{
    $response = [
        'success' => false,
        'code' => $code,
        'message' => $error,
    ];

    if(!empty($errorMessage)){
        $response['error'] = $errorMessage;
    }

    return response()->json($response, $code);
}
