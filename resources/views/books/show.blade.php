{{$book->title}}
{{$book->content}}
{{$book->author}}

<a href="{{URL::asset('/books'). '/'.$book->id . '/edit'}}">edit</a>
<form action="{{URL::asset('/books')}}">
    @csrf
    {{method_field('DELETE')}}
    <input type="submit" value="delete">
</form>