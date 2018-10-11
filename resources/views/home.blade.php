@extends('layouts.app')
@section('search')
    <form action="{{URL::asset('books'). "/search"}}" method="post">
        {{csrf_field()}}
        <input type="text" name="search" placeholder="boek titel">
        <input type="submit" name="submit">
    </form>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(count($books) > 0)
                @foreach ($books as $book)
                    <div class="col-12 col-md-6 col-xl-4">
                        <a href="/books/{{$book->id}}">
                            <div class="card mb-5 mr-2 ml-2">
								<?php
								if ($book->coverpath) {
									$cover = $book->coverpath;
								}else {
									$cover = '/bookcovers/_book-cover-placeholder.png';
								}
								?>
                                <div class="bookimage"
                                     style="background-image: url('{{$cover}}')"></div>
                                <div class="card-footer text-muted">
									<?php

									if ($book->title) {
										$title = $book->title;
									}else {
										$title = 'untitled book';
									}
									?>
                                    <h3 class="text-center">{{$title}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <h1 class="text-center mt-5">Geen boeken gevonden</h1>
                </div>
            @endif
        </div>
    </div>
@endsection
