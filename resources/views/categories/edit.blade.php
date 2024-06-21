@extends('master')
@section('content')
    <h1>Edit Category Form</h1>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">

    {{ method_field('PATCH') }}
        @include('partials.categoriesForm',
        ['buttonName' => 'Update',
         'name' => $category->name,
         'description' => $category->description])

        {{--{{ csrf_field() }}
        <label for="name">Name:</label>
        <input name="name" type="text"
               value="{{ $category->name }}"><br>
        <label for="description">Description:</label>
        <input name="description" type="text"
               value="{{$category->description}}"><br>
        <input type="submit" value="Update"><br>--}}
    </form>

    {{--@if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif--}}

    @include('partials.errors')
@endsection
