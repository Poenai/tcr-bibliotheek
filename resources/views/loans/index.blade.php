@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">book id</th>
                    <th scope="col">loan date</th>
                    <th scope="col">return date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{$loan->book_id}}</td>
                        <td>{{$loan->loan_date}}</td>
                        <td>{{$loan->return_date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
