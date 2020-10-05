<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main($value='')
    {
    	return view('welcome');
    }
 
}
