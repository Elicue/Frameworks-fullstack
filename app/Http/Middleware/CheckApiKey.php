<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\ApiKey;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->header('X-Api-Key');
        if (!$key) return response([
            'error' => 'Api Key required'
        ], 400);
        // $api_key = ApiKey::where('key', $key);
        $api_key_user = DB::table('api_keys')->where('key', $key)->value('user_id');
        // return response()->json($api_key);
        if (!$api_key_user) return response(['error' => 'Invalid Api Key'], 401);

        $request->headers->set('user_id', $api_key_user);

        // return response()->json($api_key_user);
        return $next($request);
    }
}
