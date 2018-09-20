@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('loans')}}" method="post">
        {{ csrf_field() }}
        {{method_field('patch')}}

        <label for="book">Boek:</label>
        <select id="book" class="book">
            @foreach($books as $book)
                <option value={{$book->id}}>{{$book->title}}</option>
            @endforeach
        </select>
        <label for="user">persoon:</label>
        <select id="user" class="user">
            @foreach($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
            @endforeach
        </select>
        <label for="loanDate">datum van uitgifte:</label>
        <input type="date" id="loanDate" class="loanDate">
        <label for="returnDate">datum van terugname:</label>
        <input type="date" id="returnDate" class="returnDate">

    </form>

@endsection
