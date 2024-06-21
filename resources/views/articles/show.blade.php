@extends('master')

@section('content')

    <h1>Article {{$article->id}}</h1>

    ID: {{ $article->id }}<br>
    Name: {{ $article->name }}<br>
    Body: {{ $article->body }}<br>
    Author ID: {{ $article->author_id }}<br>

    <h2>Belongs to</h2>
    Category: {{ $article->category->name }}<br>
    Description: {{ $article->category->description }}<br><br>

    <br>Tags:
    @foreach($article->tags as $tag)
        {{ $tag->name }}
    @endforeach<br><br>

    <h2>One Picture</h2>
    @isset($article->file)
        <img src="{{ asset('storage/' . $article->file) }}"
             width="100px" height="100px"><br>
    @endisset

@endsection
