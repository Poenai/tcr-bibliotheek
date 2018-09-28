
@extends('layouts.app')
@section('search')
    <form action="{{URL::asset('loans'). "/search"}}" method="post">
        {{csrf_field()}}
        <input type="text" name="search" placeholder="zoek lening">
        <input type="submit" name="submit">
    </form>
@endsection
@section('content')

    <form action="{{URL::asset('/loans')}} " method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="book_id" value="{{$book}}">
        <label for="loanDate">datum van uitgifte:</label>
        <input type="date" id="loanDate" name="loan_date">
        <label for="returnDate">datum van terugname:</label>
        <input type="date" id="returnDate" name="return_date">
        <input type="submit" value="bestel">
    </form>


@endsection