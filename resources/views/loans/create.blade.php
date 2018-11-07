
@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('/loans')}} " method="post">
        <div class="formcontainer">
            {{ csrf_field() }}
            <h4>Wanneer wil je <b>"{{$book->title}}"</b> lenen?</h4>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <label for="loanDate">datum van uitgifte:</label>
            <input type="date" id="loanDate" name="loan_date" required>
            <label for="returnDate">datum van terugname:</label>
            <input type="date" id="returnDate" name="return_date" required>
            <input type="submit" value="Bestel" class="btn">
        </div>
    </form>
@endsection
