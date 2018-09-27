<?php

namespace App\Http\Controllers;

use App\Book;
use App\Loan;
use App\User;
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
        $books = Book::all();
        $users = User::all();
        $loans = Loan::all();
        return view('loans.index',compact('loans','users', 'books'));
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
        $books = Book::all();
        $users = User::all();
        $loans = Loan::all();
        return view('loans.index',compact('loans','users', 'books'));
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
        $books = Book::all();
        $users = User::all();
        return view('loans.update',compact('loan', 'users', 'books'));
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
        $loan->update($request->all());
        $books = Book::all();
        $users = User::all();
        $loans = Loan::all();
        return view('loans.index',compact('loans','users', 'books'));
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
        $books = Book::all();
        $users = User::all();
        $loans = Loan::all();
        return view('loans.index',compact('loans','users', 'books'));
    }
    public function search()
    {
        $loans = Loan::all();
        $usersWithLoans = [];
        $users = User::where('name', 'LIKE', '%' . $_GET['Search'] . '%')
            ->get();
        $books = Book::where('title', 'LIKE', '%' . $_GET['Search'] . '%')
            ->get();
        foreach ($loans as $loan) {
            $usersWithLoans += $loan->user_id;
            foreach ($users as $user) {
                if (1==1);
            }
        }
        return view('loans.index', compact('user', 'books'));
    }
}
