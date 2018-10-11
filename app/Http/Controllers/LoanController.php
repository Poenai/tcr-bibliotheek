<?php

namespace App\Http\Controllers;

use App\Book;
use App\Loan;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::crossjoin('books','loans.book_id','=','books.id')
            ->crossjoin('users','loans.user_id','=','users.id')
            ->get();

        return view('loans.index',compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = $_GET['book_id'];
        $loans = Loan::all();
        return view('loans.create',compact('loans','book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Loan::create($request->all());

        return redirect('/loans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('loans.show',compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $loanInfo = [];
        $user = User::where('id','=',$loan->user_id)->get();
        $book = Book::where('id','=',$loan->book_id)->get();
        $books = Book::all();
        $users = User::all();

        $loanInfo[] = $loan->user_id;
        $loanInfo[] = $loan->book_id;
        $loanInfo[] = $loan->loan_date;
        $loanInfo[] = $loan->return_date;
        $loanInfo[] = $user[0]->name;
        $loanInfo[] = $book[0]->title;


        return view('loans.update',compact('loanInfo','loan', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        $loanInfo = [];
        $loan->update($request->all());

        return redirect('/loans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect('/loans');
    }

    public function search()
    {
        $loans = Loan::crossjoin('books','loans.book_id','=','books.id')
            ->crossjoin('users','loans.user_id','=','users.id')
            ->where('users.name', 'LIKE', '%' . $_POST['search'] . '%')
            ->orWhere('books.title', 'LIKE', '%' . $_POST['search'] . '%')
            ->orWhere('books.isbn', 'LIKE', '%' . $_POST['search'] . '%')
            ->get();

        return view('loans.index', compact( 'loans'));
    }
}
