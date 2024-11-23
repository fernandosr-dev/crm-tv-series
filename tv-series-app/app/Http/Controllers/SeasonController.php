<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index($seriesId)
    {
        $series = Series::findOrFail($seriesId);

        $seasons = $series->seasons()->orderBy('name', 'asc')->get();

        $seasons = $seasons->map(function ($season) {
            $season->episodes_count = $season->episodes->count() ?: 0;
            return $season;
        });

        return view('seasons.index', compact('series', 'seasons'));
    }

    public function create($seriesId)
    {
        $series = Series::findOrFail($seriesId);

        return view('seasons.create', compact('series'));
    }

    public function store(Request $request, $seriesId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $series = Series::findOrFail($seriesId);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('seasons', 'public');
        }

        Season::create([
            'name' => $request->name,
            'release_date' => $request->release_date,
            'image' => $imagePath,
            'series_id' => $seriesId,
        ]);

        $series->seasons_count = $series->seasons()->count();
        $series->save();

        return redirect()->route('seasons.index', ['seriesId' => $seriesId])
            ->with('success', 'Season created successfully');
    }

    public function edit($seriesId, $seasonId)
    {
        $series = Series::findOrFail($seriesId);
        $season = Season::findOrFail($seasonId);

        return view('seasons.edit', compact('season', 'series'));
    }

    public function update(Request $request, $seriesId, $seasonId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $season = Season::findOrFail($seasonId);

        $season->update([
            'name' => $request->name,
            'release_date' => $request->release_date,
        ]);

        if ($request->hasFile('image')) {
            if ($season->image) {
                \Storage::disk('public')->delete($season->image);
            }

            $imagePath = $request->file('image')->store('seasons', 'public');
            $season->image = $imagePath;
        }

        $season->save();

        return redirect()->route('seasons.index', ['seriesId' => $seriesId])->with('success', 'Season updated successfully');
    }


    public function destroy($seriesId, $seasonId)
    {
        $season = Season::findOrFail($seasonId);

        if ($season->image) {
            \Storage::disk('public')->delete($season->image);
        }

        $season->delete();

        return redirect()->route('seasons.index', $seriesId)->with('success', 'Season deleted successfully.');
    }
}
