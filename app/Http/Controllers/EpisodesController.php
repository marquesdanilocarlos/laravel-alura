<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        $episodes = $season->episodes;
        return view('episodes.index', compact('episodes'));
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes ?? [];

        DB::beginTransaction();
        Episode::whereIn('id', $watchedEpisodes)
            ->update(['watched' => 1]);

        Episode::whereNotIn('id', $watchedEpisodes)
            ->update(['watched' => 0]);
        DB::commit();

        return to_route('episodes.index', $season->id)->with('mensagem.sucesso', "Episódios Marcados como assistidos");
    }

}
