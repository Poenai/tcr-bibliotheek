
@extends('layouts.app')

@section('content')
    <form action="{{URL::asset('/loans')}} " method="post">
        <div class="formcontainer">
            @if($errors->any())
                <div class="alert alert-danger">
                    <b>Sorry, {{$errors->first()}}</b>
                </div>
            @endif
            {{ csrf_field() }}
            <h4>Wanneer wil je <b>"{{$book->title}}"</b> lenen?</h4>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <label for="loanDate">datum van uitgifte:</label>
            <input type="date" id="loanDate" name="loan_date" value="<?= date('Y-m-d') ?>" required >
            <label for="returnDate">datum van terugname:</label>
            <input type="date" id="returnDate" name="return_date" required>
            <input type="submit" value="Bestel" class="btn">
        </div>
    </form>
@endsection
