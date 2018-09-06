<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        if ($request->image != null){

            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $uniqueFileName = $request->title . uniqid() . '.' . $fileExtension;
            $request->file('image')->move(public_path('bookcovers'),$uniqueFileName);
            $book->coverpath = '/bookcovers/' . $uniqueFileName;

        }else {
            $book->coverpath = '/bookcovers/_book-cover-placeholder.png';
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->content = $request->content;
        $book->save();


        return redirect()->action('BookController@index')->with('status', 'boek toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.update',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if($request->image != null){
            if($book->coverpath != "/bookcovers/_book-cover-placeholder.png"){
                unlink(public_path() . $book->coverpath);
            }
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $uniqueFileName = $request->title . uniqid() . '.' . $fileExtension;
            $request->file('image')->move(public_path('bookcovers'),$uniqueFileName);
            $book->coverpath = '/bookcovers/' . $uniqueFileName;
        }


        $book->update($request->all());
        return redirect(URL::asset('/books'). '/'.$book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        unlink(public_path() . $book->coverpath);

        $book->delete();
        return redirect()->action('BookController@index')->with('status','boek verwijderd');
    }

    public function upload(){

    echo('nee...');
    }
}
