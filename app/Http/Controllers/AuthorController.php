<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Response;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $authorsCollection = new AuthorCollection($authors);

        return response()->json($authorsCollection, Response::HTTP_OK);
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }
}
