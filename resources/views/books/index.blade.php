@extends('layouts.masterlayout')
@section('title','TCR-bibliotheek')
@section('content')
<a href="{{URL::asset('/books/create')}}">boek toevoegen</a>
<table>
    <thead>
    <tr>
        <th>titel</th>
        <th>schrijver</th>
        <th>meer</th>
    </tr>
    </thead>
@foreach($books as $book)
    <tr>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td><a href="{{URL::asset('/books'). '/'.$book->id}}">meer</a></td>
    {{--<a href="{{URL::asset('/books'). '/'.$book->id}}">{{$book->title}}</a>--}}
    {{--{{$book->author}}--}}
    </tr>
@endforeach
</table>
@endsection