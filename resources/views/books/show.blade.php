@extends('layouts.app')


@section('content')

titel:  {{$book->title}}<br>
inhoud:{{$book->content}}<br>
schrijver:{{$book->author}}<br>

<a href="{{URL::asset('/books'). '/'.$book->id . '/edit'}}">edit</a>
<form action="{{URL::asset('/books'). '/'.$book->id}}" method="post">
    @csrf
    {{method_field('DELETE')}}
    <input type="submit" value="delete">
</form>
@endsection