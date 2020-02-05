<?php

namespace App\Http\Controllers;

use App\Quan;
use App\Tinh;
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
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (! $request->id) {
            $tinhs = Tinh::all();

            return view('home', compact('tinhs'));
        }

        $quans = Quan::where('tinh_id', $request->id)->get();

        return response()->json(['data' => $quans]);
    }
}
