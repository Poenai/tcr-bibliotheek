@extends('layouts.app')
@section('title','TCR-bibliotheek')
@section('content')
@if(Auth::user()->isAdmin == true)
<a href="{{URL::asset('/books/create')}}">boek toevoegen</a>
@endif
<table>
    <thead>
    <tr>
        <th>cover</th>
        <th>titel</th>
        <th>schrijver</th>
        <th>meer</th>
    </tr>
    </thead>
@foreach($books as $book)
    <tr>
        <td><img class="bookcover" src="{{$book->coverpath}}"></td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td><a href="{{URL::asset('/books'). '/'.$book->id}}">meer</a></td>
    {{--<a href="{{URL::asset('/books'). '/'.$book->id}}">{{$book->title}}</a>--}}
    {{--{{$book->author}}--}}
    </tr>
@endforeach
</table>
@endsection