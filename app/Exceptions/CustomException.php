<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomException 
{
    public static function exception($error = null, int $status = Response::HTTP_INTERNAL_SERVER_ERROR)
    {   
        if ($error instanceof HttpResponseException) {
            return $error->getResponse();
        }
        
        if (is_array($error) || is_string($error)) {
            Log::info("Exceção lançada: " . json_encode($error));
            abort(response()->json(['error' => $error],$status));
        }

        if ($error instanceof Exception) {
            Log::info("Exceção lançada: " . json_encode($error));
            abort(response()->json(['error' => $error->getMessage()], $error->getCode()));
        }

        abort(response()->json(
                Lang::get("Messages Errors Unexpected Error"),
                Response::HTTP_INTERNAL_SERVER_ERROR
            )
        );
    }
}