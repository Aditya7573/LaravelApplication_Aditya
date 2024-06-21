<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
  // use HasFactory;
    protected $fillable = [
        "name",
        "body"
    ];


    protected $dates = ['deleted_at'];

    protected $articles = 'articles';

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
