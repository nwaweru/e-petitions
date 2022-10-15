<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetitionCollection;
use App\Http\Resources\PetitionResource;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::all();
        $petitionsCollection = new PetitionCollection($petitions);

        return response()->json($petitionsCollection, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->merge([
            'author_id' => rand(1, 3),
        ]);

        $petition = Petition::create($request->only([
            'title', 'description', 'category', 'author_id', 'signees',
        ]));

        return new PetitionResource($petition);
    }

    public function show(Petition $petition)
    {
        return new PetitionResource($petition);
    }

    public function update(Request $request, Petition $petition)
    {
        $request->merge([
            'author_id' => rand(1, 3),
        ]);

        $petition->update($request->only([
            'title', 'description', 'category', 'author_id', 'signees',
        ]));

        return new PetitionResource($petition);
    }

    public function destroy(Petition $petition)
    {
        $petition->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
