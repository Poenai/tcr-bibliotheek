@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('books')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="file" name="image" id="image">

        <label for="title">titel:</label>
        <input type="text" id="title" name="title" placeholder="titel">
        <label for="content">inhoud:</label>
        <input type="text" id="content" name="content" placeholder="inhoud">
        <label for="author">schrijver:</label>
        <input type="text" id="author" name="author" placeholder="schrijver">
        <input type="submit">
    </form>

@endsection