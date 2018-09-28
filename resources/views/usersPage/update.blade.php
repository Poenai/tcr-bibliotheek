@extends('layouts.app')


@section('content')

    <form action="{{URL::asset('/userspage'). '/'.$user->id}} " method="post">
        @csrf

        <label for="username">gebruikersnaam:</label>
        <input type="text" id="username" name="username">
        <label for="email"></label>
        <input type="email" id="email" name="email">
        <input type="submit" value="Opslaan">

@endsection