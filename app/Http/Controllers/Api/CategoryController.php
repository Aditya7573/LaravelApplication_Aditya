<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort', 'id');
        $sortDirection = Str::startsWith($sortColumn, '-') ? 'desc' : 'asc';
        $sortColumn = ltrim($sortColumn, '-');
        $query = Category::query();
        $query->when(request()->filled('filter'), function ($query) {
            list($criteria, $value) = explode(':', request('filter'));
            return $query->where($criteria, $value);
        });

        $categories = $query->orderBy($sortColumn, $sortDirection)->paginate(3);
        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
        try {
            $category =  Category::create($request->all());
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Could not create category',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 500);
        }
        return new CategoryResource($category);
    }

    public function show($id)
    {
        try {
            $category =  Category::findOrFail($id);
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Category not found',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 404);
        }
        return new CategoryResource($category);
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Could not update category',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 500);
        }
        return new CategoryResource($category);
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Could not delete category',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 500);
        }
        return response()->json(null, 204);
    }
}
