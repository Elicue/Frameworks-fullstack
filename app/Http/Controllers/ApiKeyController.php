<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ApiKey;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd('index keys');
        $user = $request->user();
        $keys = $user->apiKeys()->get();

        return Inertia::render('Keys/Index', [
            'keys' => $keys,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = $request->user();
        $key = ApiKey::create([
            'uuid' => 'key-' . Str::uuid(),
            'name' => $request->name,
            'key' => bin2hex(random_bytes(20)),
            'user_id' => $user->id,
        ]);

        return redirect()->route('api-keys.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keys = ApiKey::all();

        return Inertia::render('Keys/Create', [
            'keys' => $keys,
        ]);
    }

    public function destroy(Request $request, $uuid)
    {
        $user = $request->user();
        $apiKey = $user->apiKeys()->where('uuid', $uuid)->firstOrFail();
        $apiKey->delete();

        return redirect()->route('api-keys.index');
    }
}
