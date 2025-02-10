<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return ResponseHelper::jsonResponse(true, 'Categories fetched successfully', CategoryResource::collection($categories), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $request = $request->validated();

        $categories = new Category();
        $categories->name = $request['name'];
        $categories->slug = $request['slug'];
        $categories->save();

        return ResponseHelper::jsonResponse(true, 'Categories create successfully',CategoryResource::collection($categories), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if(!$category) {
            return ResponseHelper::jsonResponse(false, 'Categories not found', null, 404);
        }

        return ResponseHelper::jsonResponse(true, 'Categories fetched successfully', CategoryResource::collection($category), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = Category::find($id);

        if(!$category) {
            return ResponseHelper::jsonResponse(false, 'Categories not found', null, 404);
        }

        $category->name = $request['name'];
        $category->slug = $request['slug'];
        $category->save();

        return ResponseHelper::jsonResponse(true, 'Category updated successfully', CategoryResource::make($category), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if(!$category) {
            return ResponseHelper::jsonResponse(false, 'Categories not found', null, 404);
        }

        $category->delete();

        return ResponseHelper::jsonResponse(true, 'Categories successfully deleted', null, 200  );

    }
}
