<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
   public function sendResponse($result , $message)
   {
       $response = [
        'success' => true,
        'data' => $result,
        'message' => $message
       ];
       return response()->json($response , 200);
   }

   public function sendError($error , $errorMessage=[] , $code = 404)
   {
       $response = [
        'success' => false,
        'data' => $error
       ];
       if (!empty($errorMessage)) {
        $response['data'] = $errorMessage;
       }
       return response()->json($response , $code);
   }
}
