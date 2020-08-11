<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    public function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => $message,
        ]);
    }

    public function sendError($error, $code = 404)
    {
        $res = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($code)) {
            $res['data'] = $code;
        }

        return $res;
    }

    public function sendSuccess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
