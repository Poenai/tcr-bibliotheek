@extends('layouts.app')
@section('search')
    <form action="{{URL::asset('loans'). "/search"}}" method="post">
        {{csrf_field()}}
        <input type="text" name="search" placeholder="zoek lening">
        <input type="submit" name="submit">
    </form>
@endsection
@section('content')
    <form action="{{URL::asset('/loans'). '/'.$loan->id}} " method="post">
        {{ csrf_field() }}
        {{method_field('patch')}}

        <label for="book">Boek:</label>
        <select id="book" name="book_id">
                <option value="{{$loanInfo[1]}}" selected="selected">{{$loanInfo[5]}}</option>
            @foreach($books as $book)
                <option value={{$book->id}}>{{$book->title}}</option>
            @endforeach
        </select>
        <label for="user">persoon:</label>
        <select id="user" name="user_id">
            <option value="{{$loanInfo[0]}}">{{$loanInfo[4]}}</option>
        @foreach($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
            @endforeach
        </select>
        <label for="loanDate">datum van uitgifte:</label>
        <input type="date" id="loanDate" name="loan_date">
        <label for="returnDate">datum van terugname:</label>
        <input type="date" id="returnDate" name="return_date">
        <input type="submit" value="pas aan">

    </form>

@endsection
