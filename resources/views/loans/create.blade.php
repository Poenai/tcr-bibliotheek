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
            <input type="hidden" name="book_id" value="{{$book->id}}">

            @if(Auth::user()->isAdmin())
                <label for="user_id">lener:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}} ({{$user->email}})</option>
                    @endforeach
                </select>
            @else
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            @endif

            <label for="loanDate">datum van uitgifte:</label>
            <input type="date" id="loanDate" name="loan_date" value="<?= date('Y-m-d') ?>" required class="form-control">

            <label for="returnDate">datum van terugname:</label>
            <input type="date" id="returnDate" name="return_date" required class="form-control">

            <input type="submit" value="Bestel" class="btn">
        </div>
    </form>
@endsection
