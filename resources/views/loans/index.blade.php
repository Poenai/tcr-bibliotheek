@extends('layouts.app')
@section('search')
    <form action="{{URL::asset('loans'). "/search"}}" method="post">
        {{csrf_field()}}
        <input type="text" name="search" placeholder="zoek lening">
        <input type="submit" name="submit">
    </form>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">book id</th>
                    <th scope="col">user id</th>
                    <th scope="col">loan date</th>
                    <th scope="col">return date</th>
                    <th scope="col">edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{$loan->book_id}}</td>
                        <td>{{$loan->user_id}}</td>
                        <td>{{$loan->loan_date}}</td>
                        <td>{{$loan->return_date}}</td>
                        <td><a href="{{URL::asset('/loans'). '/'.$loan->id . '/' . 'edit'}}">edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
