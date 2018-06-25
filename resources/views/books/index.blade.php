@extends('layouts.app')

@section('content')
    @foreach($books as $book)
        <a href="{{URL::asset('/books'). '/'.$book->id}}">{{$book->title}}</a>
        {{$book->author}}
    @endforeach
@endsection