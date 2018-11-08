@extends('layouts.app')
@section('search')
    <form action="{{URL::asset('loans'). "/search"}}" method="post" class="searchform">
        {{csrf_field()}}
        <input type="text" name="search" placeholder="zoek lening">
        <input type="submit" name="submit" value="Search">
    </form>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ISBN nummer</th>
                    <th scope="col">Boek</th>
                    <th scope="col" width="250">Geleend aan</th>
                    <th scope="col" width="100">Geleent op</th>
                    <th scope="col" width="100">Moet terug komen op</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($loans as $loan)
                    <tr>
                        <td>{{$loan['isbn']}}</td>
                        <td>
                            <a href="/books/{{$loan['book_id']}}">{{$loan['bookName']}}<?php if (isset($loan['title'])) echo $loan['title'] ?></a>
                        </td>
                        <td>{{$loan['name']}}<br>{{$loan['email']}}</td>
                        <td>{{$loan['loan_date']}}</td>
                        <td <?php if(strtotime($loan['return_date']) < time()) echo 'class="table-danger"'?>>{{$loan['return_date']}}</td>

                        <?php if(!isset($loan['content'])): ?>
                        <td><a href="/loans/{{$loan['id']}}/edit">bewerken</a></td>
                        <?php endif; ?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
