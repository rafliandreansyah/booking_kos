<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('pages.orders.orders');
    }
}
