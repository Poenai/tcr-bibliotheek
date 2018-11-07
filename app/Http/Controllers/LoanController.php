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
        $loansRes = Loan::all();

        $loans = [];

        foreach ($loansRes as $loanRes) {

            $query = Book::select('title', 'isbn')->where('id', '=', $loanRes->book_id)->get()[0];
            $query2 = User::select('name')->where('id', '=', $loanRes->user_id)->get()[0];

            $loans[] = [
                'id' => $loanRes->id,
                'isbn' => $query->isbn,
                'book_id' => $loanRes->book_id,
                'loan_date' => $loanRes->loan_date,
                'return_date' => $loanRes->return_date,
                'bookName' => $query->title,
                'name' => $query2->name,
            ];
        }


        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Book::findOrFail($_GET['book_id']);

        return view('loans.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (strtotime($request->loan_date) > strtotime($request->return_date)) {
            return back()->withErrors(['de datum van uitgifte was later dan de terugname datum']);
        }

        if ((strtotime($request->return_date) - strtotime($request->loan_date)) > 15768000) {
            return back()->withErrors(['je kan een boek niet langer lenen dan een half jaar']);
        }

        Loan::create($request->all());

        return redirect('/loans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $loanInfo = [];
        $user = User::where('id', '=', $loan->user_id)->get();
        $book = Book::where('id', '=', $loan->book_id)->get();
        $books = Book::all();
        $users = User::all();

        $loanInfo[] = $loan->user_id;
        $loanInfo[] = $loan->book_id;
        $loanInfo[] = $loan->loan_date;
        $loanInfo[] = $loan->return_date;
        $loanInfo[] = $user[0]->name;
        $loanInfo[] = $book[0]->title;


        return view('loans.update', compact('loanInfo', 'loan', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Loan $loan
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
     * @param  \App\Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect('/loans');
    }

    public function search()
    {
        $loans = Loan::crossjoin('books', 'loans.book_id', '=', 'books.id')
            ->crossjoin('users', 'loans.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%' . $_POST['search'] . '%')
            ->orWhere('books.title', 'LIKE', '%' . $_POST['search'] . '%')
            ->orWhere('books.isbn', 'LIKE', '%' . $_POST['search'] . '%')
            ->get();

        return view('loans.index', compact('loans'));
    }
}
