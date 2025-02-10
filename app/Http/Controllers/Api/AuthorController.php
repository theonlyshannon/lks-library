<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Resources\PublisherResource;
use App\Http\Requests\AuthorUpdateRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::all();

        return ResponseHelper::jsonResponse(true, 'Author fetched successfully', AuthorResource::collection($author), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorStoreRequest $request)
    {
        $request = $request->validated();

        $author = new Author();
        $author->name = $request['name'];
        $author->slug = $request['bio'];
        $author->save();

        return ResponseHelper::jsonResponse(true, 'Author create successfully', AuthorResource::collection( $author), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Publisher::find($id);

        if(!$author) {
            return ResponseHelper::jsonResponse(false, 'Author not found', null, 404);
        }

        return ResponseHelper::jsonResponse(true, 'Author fetched successfully', AuthorResource::collection($author), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorUpdateRequest $request, string $id)
    {
        $author = Author::find($id);

        if(!$author) {
            return ResponseHelper::jsonResponse(false, 'Author not found', null, 404);
        }

        $author->name = $request['name'];
        $author->slug = $request['bio'];
        $author->save();

        return ResponseHelper::jsonResponse(true, 'Author updated successfully', AuthorResource::make($author), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);

        if(!$author) {
            return ResponseHelper::jsonResponse(false, 'Author not found', null, 404);
        }

        $author->delete();

        return ResponseHelper::jsonResponse(true, 'Author successfully deleted', null, 200  );
    }
}
