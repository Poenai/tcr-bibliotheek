@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('/books'). '/'.$book->id }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}

        <div class="formcontainer">
            <label for="image">Verander de cover foto:</label>
            <input type="file" name="image" id="image">
            <input type="text" id="title" name="title" placeholder="titel" value="{{$book->title}}" required>
            <input type="text" id="author" name="author" placeholder="schrijver" value="{{$book->author}}" required>
            <input type="text" id="isbn" name="isbn" placeholder="ISBN nummer" value="{{$book->isbn}}">
            <label for="content">Korte beschrijving:</label>
            <textarea id="content" cols="70" rows="15" name="content" required>{{$book->content}}</textarea>
            <input type="submit" class="btn" value="Bijwerken">
        </div>
    </form>
@endsection
