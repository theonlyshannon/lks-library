<?php

namespace App\Http\Controllers\Api;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Http\Requests\PublisherStoreRequest;
use App\Http\Requests\PublisherUpdateRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher = Publisher::all();

        return ResponseHelper::jsonResponse(true, 'Publisher fetched successfully', PublisherResource::collection($publisher), 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PublisherStoreRequest $request)
    {
        $request = $request->validated();

        $publisher = new Publisher();
        $publisher->name = $request['name'];
        $publisher->slug = $request['address'];
        $publisher->save();

        return ResponseHelper::jsonResponse(true, 'Publisher create successfully', PublisherResource::collection($publisher), 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publisher = Publisher::find($id);

        if(!$publisher) {
            return ResponseHelper::jsonResponse(false, 'Publisher not found', null, 404);
        }

        return ResponseHelper::jsonResponse(true, 'Publisher fetched successfully', PublisherResource::collection($publisher), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublisherUpdateRequest $request, string $id)
    {
        $publisher = Publisher::find($id);

        if(!$publisher) {
            return ResponseHelper::jsonResponse(false, 'Publisher not found', null, 404);
        }

        $publisher->name = $request['name'];
        $publisher->slug = $request['address'];
        $publisher->save();

        return ResponseHelper::jsonResponse(true, 'Publisher create successfully', PublisherResource::collection($publisher), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = Publisher::find($id);

        if(!$publisher) {
            return ResponseHelper::jsonResponse(false, 'Publisher not found', null, 404);
        }

        $publisher->delete();

        return ResponseHelper::jsonResponse(true, 'Publisher successfully', null, 200);
    }
}
