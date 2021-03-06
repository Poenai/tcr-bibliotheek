<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$books = DB::table('books')->select('*')->distinct()->get();

        return view('home',compact('books'));
    }
}
