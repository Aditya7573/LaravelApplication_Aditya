@extends('master')

@section('content')

    <h1>New Category Form</h1>

    <form method="POST" action="{{action ('CategoryController@store')}}">
        @include('partials.categoriesForm',
            ['buttonName'  => 'Create',
            'name'        => old('name'),
            'description' => old('description')])

        {{--{{ csrf_field() }}
        <label for="name">Name:</label>
        <input name="name" type="text"><br>
        <label for="description">Description:</label>
        <input name="description" type="text"><br>
        <input type="submit" value="Submit"><br>--}}
    </form>

    {{--@if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif--}}

    @include('partials.errors')


