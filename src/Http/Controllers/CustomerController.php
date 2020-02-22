<?php


namespace Iyngaran\Customer\Http\Controllers;


use Illuminate\Routing\Controller;

class CustomerController extends Controller
{

    public function index()
    {
        return view('iyngaran::customers');
    }

}