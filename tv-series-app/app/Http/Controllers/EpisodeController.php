<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index($seriesId, $seasonId)
    {
        $series = Series::findOrFail($seriesId);
        $season = Season::findOrFail($seasonId);
        $episodes = $season->episodes()->orderBy('number')->get();
        //dd($episodes);

        return view('episodes.index', compact('series', 'season', 'episodes'));
    }

    public function show($seriesId, $seasonId, $episodeId)
    {
        $episode = Episode::findOrFail($episodeId);
        return view('episodes.show', compact('episode'));
    }

    public function edit($seriesId, $seasonId, $episodeId)
    {
        $episode = Episode::findOrFail($episodeId);
        $season = Season::findOrFail($seasonId);
        $series = Series::findOrFail($seriesId);

        return view('episodes.edit', compact('episode', 'season', 'series'));
    }

    public function update(Request $request, $seriesId, $seasonId, $episodeId)
    {
        $request->validate([
            'number' => 'required|integer',
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'duration' => 'nullable|integer',
        ]);

        $episode = Episode::findOrFail($episodeId);

        $episode->update([
            'number' => $request->number,
            'name' => $request->name,
            'release_date' => $request->release_date,
            'duration' => $request->duration,
        ]);

        return redirect()->route('episodes.index', ['seriesId' => $seriesId, 'seasonId' => $seasonId])->with('success', 'Episode updated successfully');
    }

    public function create($seriesId, $seasonId)
    {
        $series = Series::findOrFail($seriesId);
        $season = Season::findOrFail($seasonId);

        return view('episodes.create', compact('series', 'season'));
    }

    public function store(Request $request, $seriesId, $seasonId)
    {
        $request->validate([
            'number' => 'required|integer',
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'duration' => 'required|integer',
        ]);

        $season = Season::findOrFail($seasonId);

        Episode::create([
            'number' => $request->number,
            'name' => $request->name,
            'release_date' => $request->release_date,
            'season_id' => $seasonId,
            'duration' => $request->duration,
        ]);

        return redirect()->route('episodes.index', ['seriesId' => $seriesId, 'seasonId' => $seasonId])->with('success', 'Episode created successfully');
    }

    public function destroy($seriesId, $seasonId, $episodeId)
    {
        $episode = Episode::findOrFail($episodeId);
        $episode->delete();

        return redirect()->route('episodes.index', ['seriesId' => $seriesId, 'seasonId' => $seasonId])->with('success', 'Episode deleted successfully');
    }
}
