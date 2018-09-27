@extends('layouts.app')


@section('content')
<button onclick="Window.navigate('./edit')"></button>
<table style="width: 98vh; margin-left: 1vh;">
    <tr><th>id</th><th>Gebruikersnaam</th><th>email</th></tr>

    <tr><td>{{id}}</td><td>{{name}}</td><td>{{email}}</td></tr>

</table>

@endsection