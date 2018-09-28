@extends('layouts.app')
@section('title','TCR-bibliotheek')
@section('search')
    <form action="{{URL::asset('books'). "/search"}}" method="post">
        {{csrf_field()}}
        <input type="text" name="search" placeholder="boek titel">
        <input type="submit" name="submit">
    </form>
@endsection
@section('content')
@if(Auth::user()->isAdmin == true)
<a href="{{URL::asset('/books/create')}}">boek toevoegen</a>
@endif
<table>
    <thead>
    <tr>
        <th>cover</th>
        <th>titel</th>
        <th>schrijver</th>
        <th>meer</th>
    </tr>
    </thead>
@foreach($books as $book)
    <tr>
        <td><img class="bookcover" src="{{$book->coverpath}}"></td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td><a href="{{URL::asset('/books'). '/'.$book->id}}">meer</a></td>
    {{--<a href="{{URL::asset('/books'). '/'.$book->id}}">{{$book->title}}</a>--}}
    {{--{{$book->author}}--}}
    </tr>
@endforeach
</table>
@endsection

{{--@section('scripts')--}}
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function(){--}}
            {{--$("#search").trigger('keyup');--}}
        {{--});--}}
        {{--$('#search').on('keyup', function () {--}}
            {{--$value = $(this).val();--}}
            {{--$.ajax({--}}
                {{--type : 'get',--}}
                {{--url : '{{ URL::to('/search-results') }}',--}}
                {{--data : {'results': $value},--}}
                {{--success: function (data) {--}}
                    {{--if (data) {--}}
                        {{--$('.bs-component').html(data);--}}
                    {{--} else {--}}
                        {{--$('.bs-component').html('<div class="col-md-10 col-md-offset-1">There are no book titles matching your search criteria.</div');--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}