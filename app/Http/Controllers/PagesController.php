<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
class PagesController extends Controller
{
    public function index(){
        return view('index')->with('posts', Gallery::orderBy('updated_at', 'DESC')->take(4)->get());
    }
}
