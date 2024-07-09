<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackController extends Controller
{

    public function index()
    {
        // $tracks = Track::all();
        $tracks = Track::where('display', true)->orderBy('artist')->get();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        // sleep(2);

        // dd($request->all());

        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'artist' => ['required', 'string', 'max:255', 'min:3'],
            'cover' => ['required', 'image'],
            'file' => ['required', 'file', 'mimes:mp3,wav,mov',],
            'display' => ['required', 'boolean'],
        ]);

        Track::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'cover' => $request->file('cover')->store('covers', 'public'),
            'file' => $request->file('file')->store('files', 'public'),
            'display' => $request->display,
        ]);

        return redirect()->back();
        // return redirect()->route('tracks.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
