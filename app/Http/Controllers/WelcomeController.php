<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
	public function index()
	{
		return view('main_page');
	}
}