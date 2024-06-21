<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\Category as CategoryResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'articles' => $this->when(
                $request->get('include') == 'articles',
                Article::collection($this->articles))
        ];
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }

}
