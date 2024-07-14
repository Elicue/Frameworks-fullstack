<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckApiKey;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


class PlaylistController extends Controller
{
    public function __construct()
    {
        Route::middleware(CheckApiKey::class);
    }

    public function index(Request $request)
    {
        $user_id = $request->headers->get('user_id');

        $playlists = DB::table('playlists')->where('user_id', $user_id)->get();

        return response()->json($playlists);
    }
}
