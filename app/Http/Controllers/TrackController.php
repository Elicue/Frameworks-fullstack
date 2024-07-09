<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

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

        $uuid = 'trk-' . Str::uuid();

        $imageExtension = $request->cover->extension();
        $imagePath = $request->cover->storeAs('tracks/images', $uuid . '.' . $imageExtension);

        $fileExtension = $request->file->extension();
        $filePath = $request->file->storeAs('tracks/files', $uuid . '.' . $fileExtension);

        Track::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'cover' => $imagePath,
            'file' => $filePath,
            'display' => $request->display,
        ]);

        // return redirect()->back();
        return redirect()->route('tracks.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Track $track)
    {
        return Inertia::render('Track/Edit', [
            'track' => $track,
        ]);
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'artist' => ['required', 'string', 'max:255', 'min:3'],
            'display' => ['required', 'boolean'],
        ]);

        // $track->update($request->all()); // this is the same as the following

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;
        $track->save();

        return redirect()->route('tracks.index');
    }

    public function destroy(Track $track)
    {
        $track->delete();

        return redirect()->route('tracks.index');
    }
}
