@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($books as $book)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card mb-4">
                        <div class="bookimage"
                             style="background-image: url('{{$book->coverpath}}')"></div>
                        <div class="card-footer text-muted">
                            <h3 class="text-center">{{$book->title}}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
