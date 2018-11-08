@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('/loans'). '/'.$loan->id}} " method="post">
        <div class="formcontainer">
            {{ csrf_field() }}
            {{method_field('patch')}}

            <label for="book">Boek:</label>
            <select id="book" name="book_id" class="form-control" required>
                <option value="{{$loanInfo[1]}}" selected="selected">{{$loanInfo[5]}}</option>
                @foreach($books as $book)
                    <option value={{$book->id}}>{{$book->title}}</option>
                @endforeach
            </select>
            <label for="user">lener:</label>
            <select id="user" name="user_id" class="form-control" required>
                <option value="{{$loanInfo[0]}}">{{$loanInfo[4]}}</option>
                @foreach($users as $user)
                    <option value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
            <label for="loanDate">datum van uitgifte:</label>
            <input type="date" id="loanDate" name="loan_date" class="form-control" value="{{$loanInfo[2]}}" required>
            <label for="returnDate">datum van terugname:</label>
            <input type="date" id="returnDate" name="return_date"  class="form-control" value="{{$loanInfo[3]}}" required>
            <input type="submit" value="pas aan" class="btn">
        </div>

    </form>

@endsection
