@extends('master')

@section('content')
    <h1>All Categories</h1>
    @foreach($categories as $category)
        Id: {{$category->id}}</br>
        Name: {{$category->name}}<br>
        {{--        <a href="{{ action('CategoryController@show', ['id' => $category->id]) }}"> {{ $category->name }}</a>--}}

        Description: {{$category->description}}<br>
        <!-- Delete button -->
        <form method="post" action="{{ route('categories.destroy', $category->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        </div>
    @endforeach
    {{ $categories->links() }}

    @parent
@endsection

