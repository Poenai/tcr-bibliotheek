@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('/books'). '/'.$book->id }}" method="post">
        @csrf
        {{method_field('PATCH')}}

            <input type="file" name="image" id="image">

        <label for="title">titel:</label>
        <input type="text" id="title" name="title" value="{{$book->title}}">
        <label for="content">inhoud:</label>
        <input type="text" id="content" name="content" value="{{$book->content}}">
        <label for="author">schrijver:</label>
        <input type="text" id="author" name="author" value="{{$book->author}}">
        <input type="submit">
    </form>
@endsection