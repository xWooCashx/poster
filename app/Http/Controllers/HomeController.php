<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search()
    {
        return view('search');
    }
    public function searchFor(Request $request)
    {
  echo('asdasd');
    // $text = $request->input('text');

    // // search the members table
     //$results = DB::table('users')->where('name', 'Like', $text)->get();
    //    // $this->validate($request, [
    //     //    'searchWord' => 'required|max:300'
    //     //    ]);
            // return response()->json($results,200);
    }
}
