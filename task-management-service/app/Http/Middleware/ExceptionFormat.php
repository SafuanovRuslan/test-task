<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExceptionFormat
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if ($response->exception) {
            try {
                $code = $response->exception->getCode() ?: $response->exception->getStatusCode();
                return response()->json([
                    'message' => $response->exception->getMessage(),
                ], $code);
            } catch (\Throwable) {
                return response()->json([
                    'message' => "Unknown error. Contact the administrator.",
                ], 500);
            }
        }

        return $response;
    }
}
