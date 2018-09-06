@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-12 col-md-6 row justify-content-center center">
                <div class="col-6">
                    <div class="bookimage" style="background-image: url('{{$book->coverpath}}')"></div>
                </div>
            </div>
            <div class="col-12 col-md-6 row align-items-center justify-content-center">
                <div>
                    <h1>{{$book->title}}</h1>
                    <h4>geschreven door {{$book->author}}</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <p>{{$book->content}}</p>
        </div>
    </div>

    <a href="{{URL::asset('/books'). '/'.$book->id . '/edit'}}">edit</a>
    <form action="{{URL::asset('/books'). '/'.$book->id}}" method="post">
        @csrf
        {{method_field('DELETE')}}
        <input type="submit" value="delete">
    </form>
@endsection
