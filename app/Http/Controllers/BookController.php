<?php

namespace App\Http\Controllers;

use App\Book;
use App\Loan;
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
        return redirect('/');
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        if ($request->image != null) {

            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $uniqueFileName = $request->title . uniqid() . '.' . $fileExtension;
            $request->file('image')->move(public_path('bookcovers'), $uniqueFileName);
            $book->coverpath = '/bookcovers/' . $uniqueFileName;

        } else {
            $book->coverpath = '/bookcovers/_book-cover-placeholder.png';
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->content = $request->content;
        $book->amount = $request->amount;
        $book->save();


        return redirect()->action('HomeController@index')->with('status', 'boek toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        if ($book->coverpath == null) {
            $book->coverpath = '/bookcovers/_book-cover-placeholder.png';
        }
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if ($request->image != null) {
            if ($book->coverpath != "/bookcovers/_book-cover-placeholder.png") {
                @unlink(public_path() . $book->coverpath);
            }
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $uniqueFileName = $request->title . uniqid() . '.' . $fileExtension;
            $request->file('image')->move(public_path('bookcovers'), $uniqueFileName);
            $book->coverpath = '/bookcovers/' . $uniqueFileName;
        }

        $book->update($request->all());
        return redirect(URL::asset('/books') . '/' . $book->id)->with('status', 'Boek is aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->amount == 1) {
            if ($book->coverpath == '/bookcovers/_book-cover-placeholder.png' OR $book->coverpath == '') {

            } else {
                @unlink(public_path() . $book->coverpath);
            }

            Loan::where('book_id', $book->id)->delete();
            $book->delete();

            return redirect()->action('HomeController@index')->with('status', 'boek verwijderd');
        } else {
            $book->amount--;
            $book->save();
            return redirect("/books/{$book->id}")->with('status', 'eén exemplaar verwijderd');
        }


    }

    //	public function upload()
    //	{
    //
    //    echo('nee...');
    //    }

    //    public function search()
    ////    {
    ////        $books = Book::orderBy('name')->get();
    ////        return view('book.search')->with('book', $books);
    ////    }
    ////
    ////    public function search_results(Request $request)
    ////    {
    ////        if ($request ->ajax())
    ////        {
    ////            $books = Book::with('title')->where('name', 'LIKE', '%')
    ////                ->orWhereHas('title', function($q) use ($request)
    ////                {
    ////                    $q->where('name', 'LIKE', '%' . $request->results . '%');
    ////                })->orderBy('name', 'asc')->get();
    ////            if($books)
    ////                $results = '';
    ////            foreach ($books as $book)
    ////            {
    ////                $results .= '<div class="col-md-2">
    ////                                <div class="thumbnail" data-toggle="tooltip" data-placement="top" title=""
    ////                                    data-original-title="' . $book->name . '"><a href"'.route('book.show', ['id' => $book->id]).'"><img src="' . url($book->poster) . '"alt="' . $book->name . '"
    ////                                    style="width:100%"/></a></div></div>';
    ////            }
    //            return Response($results);
    //        }
    //    }
    public function search()
    {

        $searchQuery = $_POST['search'];

        $books = Book::where('title', 'LIKE', "%{$searchQuery}%")
            ->orWhere('content', 'LIKE', "%{$searchQuery}%")
            ->orWhere('isbn', 'LIKE', "%{$searchQuery}%")
            ->orWhere('author', 'LIKE', "%{$searchQuery}%")
            ->get();


        return view('home', compact('books', 'searchQuery'));
    }
}
