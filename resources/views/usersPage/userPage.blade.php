@extends('layouts.app')


@section('content')
<button onclick="Window.navigate('./edit')" style="border-radius: 100px; border-color: #0b2e13; font-family: Impact;margin: 10px;">+</button>
<table style="width: 98vh; margin-left: 1vh;">
    <tr><th>id</th><th>Gebruikersnaam</th><th>email</th></tr>
    @foreach($users as $user)
        <tr><td>{{$user->id}}</td><td>{{$user->name}}</td><td>{{$user->email}}</td></tr>
    @endforeach
</table>

@endsection