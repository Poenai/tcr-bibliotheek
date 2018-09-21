@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-12 col-md-6 row justify-content-center center">
                <div class="col-6">
					<?php
					if ($book->coverpath) {
						$cover = $book->coverpath;
					}else {
						$cover = '/bookcovers/_book-cover-placeholder.png';
					}
					?>
                    <div class="bookimage" style="background-image: url('{{$cover}}')"></div>
                </div>
            </div>
            <div class="col-12 col-md-6 row align-items-center justify-content-center">
                <div>
					<?php

					if ($book->title) {
						$title = $book->title;
					}else {
						$title = 'untitled book';
					}
					?>

					<?php

					if ($book->author) {
						$author = $book->author;
					}else {
						$author = 'unknown author';
					}
					?>
                    <h1 class="mt-4">{{$title}}</h1>
                    <h4>geschreven door {{$author}}</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <p style="white-space: pre-wrap">{{$book->content}}</p>
        </div>
        @if(Auth::user()->isAdmin)
            <a href="{{URL::asset('/books'). '/'.$book->id . '/edit'}}">
                <button type="button" class="btn btn-secondary float-left mr-3">edit</button>
            </a>
            <form action="{{URL::asset('/books'). '/'.$book->id}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-secondary float-left" value="delete">
            </form>
            <form action="{{URL::asset('/loans'). '/create'}}" method="get">
                @csrf
                <input type="hidden" value="{{$book->id}}" name="book_id">
                <input type="submit" class="btn btn-secondary float-left" value="bestel">
            </form>

        @endif
    </div>
@endsection
