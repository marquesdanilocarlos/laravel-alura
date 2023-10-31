<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(
        private SeriesRepository $repository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Series::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request->all());
        return response()->json($serie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $series = Series::whereId($id)->with('seasons.episodes')->first();
        return $series;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}