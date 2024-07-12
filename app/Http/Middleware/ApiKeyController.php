<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        dd('index keys');
        $user = $request->user();
        $apiKeys = $user->apiKeys()->get();

        return Inertia::render('ApiKey/Index', [
            'apiKeys' => $apiKeys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ApiKey/Create');
    }

    public function destroy(Request $request, $uuid)
    {
        $user = $request->user();
        $apiKey = $user->apiKeys()->where('uuid', $uuid)->firstOrFail();
        $apiKey->delete();
    }
}
