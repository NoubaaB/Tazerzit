<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TazerzitController extends Controller
{
   
    public function blog()
    {
        Request()->session()->flash('blog', 'active');
        return view("tazerzit.blog");
    }
    public function home()
    {
        Request()->session()->flash('home', 'active');
        return view("tazerzit.index");
    }
    public function menu()
    {
        Request()->session()->flash('menu', 'active');
        return view("tazerzit.menu");
    }
    public function about()
    {
        Request()->session()->flash('about', 'active');
        return view("tazerzit.about");
    }
    public function services()
    {
        Request()->session()->flash('services', 'active');
        return view("tazerzit.services");
    }
    public function contact()
    {
        Request()->session()->flash('contact', 'active');
        return view("tazerzit.contact");
    }
}
