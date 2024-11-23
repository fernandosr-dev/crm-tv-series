<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::orderBy('name')->get();

        $series = $series->map(function ($serie) {
            $serie->episodes_count = $serie->seasons->sum(function ($season) {
                return $season->episodes->count();
            });
            return $serie;
        });

        return view('series.index', compact('series'));
    }

    public function show($id)
    {
        $serie = Series::findOrFail($id);
        $seasons = $serie->seasons()->withCount('episodes')->get();

        return view('series.show', compact('serie', 'seasons'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('series', 'public');
        }

        $serie = Series::create([
            'name' => $request->name,
            'photo' => $photoPath,
        ]);

        $serie->seasons_count = $serie->seasons()->count();
        $serie->save();

        return redirect()->route('series.index')->with('success', 'Series added successfully.');
    }

    public function edit($id)
    {
        $series = Series::findOrFail($id);
        return view('series.edit', compact('series'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $series = Series::findOrFail($id);

        $series->name = $request->name;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('series', 'public');
            $series->photo = $photoPath;
        }

        $series->seasons_count = $series->seasons()->count();

        $series->save();

        return redirect()->route('series.index')->with('success', 'Series updated successfully');
    }

    public function destroy($id)
    {
        $serie = Series::findOrFail($id);

        if ($serie->photo) {
            \Storage::disk('public')->delete($serie->photo);
        }

        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Series deleted successfully.');
    }
}
