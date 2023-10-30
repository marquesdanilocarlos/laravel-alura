<?php

namespace App\Http\Controllers;

use App\Models\Season;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        $episodes = $season->episodes;
        return view('episodes.index', compact('episodes'));
    }

}
