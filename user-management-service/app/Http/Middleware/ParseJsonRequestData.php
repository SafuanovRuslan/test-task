<?php

namespace App\Http\Middleware;

use Closure;

class ParseJsonRequestData
{
    public function handle($request, Closure $next)
    {
        $postData = file_get_contents('php://input');
        $postData = json_decode($postData, true);
        if ($postData) {
            $_POST = $postData;
        }

        return $next($request);
    }
}
