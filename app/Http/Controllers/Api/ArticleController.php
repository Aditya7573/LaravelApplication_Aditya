<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort', 'id');
        $sortDirection = Str::startsWith($sortColumn, '-') ? 'desc' : 'asc';
        $sortColumn = ltrim($sortColumn, '-');
        $query = Article::query();
        $query->when(request()->filled('filter'), function ($query) {
            list($criteria, $value) = explode(':', request('filter'));
            return $query->where($criteria, $value);
        });

        $articles = $query->orderBy($sortColumn, $sortDirection)->paginate(10);
        return ArticleResource::collection($articles);
    }

    public function store(ArticleResource $request)
    {
        try {
            $article = Article::create($request->all());
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Could not create article',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 500);
        }
        return new ArticleResource($article);
    }

    public function show($id)
    {
        try {
            $article = Article::findOrFail($id);
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Article not found',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 404);
        }
        return new ArticleResource($article);
    }

    public function update(ArticleResource $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->update($request->all());
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Could not update article',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 500);
        }
        return new ArticleResource($article);
    }

    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'title'  => 'Could not delete article',
                    'detail' => $e->getMessage(),
                    'code'   => 1,
                ],
            ], 500);
        }
        return response()->json(null, 204);
    }
}
