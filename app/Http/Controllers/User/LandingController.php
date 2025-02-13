<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct(){

    }

    public function index()
    {
        return view('user.landing');
    }

    public function who()
    {
        return view('user.who');
    }

    public function what()
    {
        return view('user.what');
    }

    public function caseStudies()
    {
        return view('user.case-studies');
    }

    public function contact()
    {
        return view("user.contact");
    }
}
