@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('books')}}" method="post">
        {{ csrf_field() }}
        <label for="title">titel:</label>
        <input type="text" id="title" name="title" placeholder="titel">
        <label for="content">inhoud:</label>
        <input type="text" id="content" name="content" placeholder="inhoud">
        <label for="author">schrijver:</label>
        <input type="text" id="author" name="author" placeholder="schrijver">
        <input type="submit">
    </form>

    <form action="{{URL::asset('books/upload')}}" method="post">
        {{ csrf_field() }}
        <input type="file" name="image" id="image">
        <input type="submit" name="upload">
    </form>
@endsection