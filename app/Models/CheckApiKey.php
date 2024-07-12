<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Http\Response;

class CheckApiKey extends Model
{

    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->headers->get('X-Api-Key');

        if (!$key) return response(['error' => 'Api Key required'], 400);
        $api_key = ApiKey::firstWhere('key', $key);
        if (!$api_key) return response(['error' => 'Bad Api Key'], 401);
        $user = $api_key->user;
        $request->merge(['user' => $user]);

        return $next($request);
    }
}
