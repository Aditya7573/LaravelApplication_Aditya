@extends('master')

@section('content')
    <h1>Category</h1>

    ID: {{ $category->id }}<br>
    Name: {{ $category->name }}<br>
    Description: {{ $category->description }}<br><br>

    @foreach ($category->articles as $article)
        <h2>Articles:</h2>
        ID: {{ $article->id }}<br>
        Name: {{ $article->name }}<br>
        Body: {{ $article->body }}<br>
        Author ID: {{ $article->author_id }}<br>
    @endforeach
@endsection

