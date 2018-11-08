@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('books')}}" method="post" enctype="multipart/form-data" class="bookform">
        {{ csrf_field() }}

        <div class="formcontainer">
            <label for="image">Voeg een cover foto toe:</label>
            <input type="file" name="image" id="image">
            <input type="text" id="title" name="title" placeholder="titel" required class="form-control">
            <input type="text" id="author" name="author" placeholder="schrijver" required class="form-control">
            <input type="text" id="isbn" name="isbn" placeholder="ISBN nummer" required class="form-control">
            <label for="amount">Aantal exemplaren:</label>
            <input type="number" id="amount" name="amount" value="1" class="form-control" required>
            <label for="content">Korte beschrijving:</label>
            <textarea id="content" cols="70" rows="15" name="content" required class="form-control"></textarea>
            <input type="submit" class="btn" value="Opslaan">
        </div>
    </form>
@endsection
