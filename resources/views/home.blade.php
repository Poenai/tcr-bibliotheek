@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($books as $book)
                <div class="col-12 col-md-6 col-xl-4">
                    <a href="/books/{{$book->id}}">
                        <div class="card mb-5 mr-2 ml-2">
                            <div class="bookimage"
                                 style="background-image: url('{{$book->coverpath}}')"></div>
                            <div class="card-footer text-muted">
                                <h3 class="text-center">{{$book->title}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
