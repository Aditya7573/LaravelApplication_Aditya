<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResource;
use App\Http\Resources\Article as ArticleResource;

class Article extends JsonResource
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
            'body' => $this->body,
            'tags' => TagResource::collection($this->tags)
        ];
    }

    public function show($id) {
        $category = Article::findOrFail($id);
        return new ArticleResource($category);
    }
}
