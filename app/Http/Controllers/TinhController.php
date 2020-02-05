<?php

namespace App\Http\Controllers;

use App\Tinh;
use Illuminate\Http\Request;

class TinhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tinhs = Tinh::all();

        return view('admin.tinh.index', compact('tinhs'));
    }
}
