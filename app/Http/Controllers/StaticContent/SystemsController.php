<?php

namespace App\Http\Controllers\StaticContent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemsController extends Controller{
    
	public function listView() {
		return view("static-content.home");
	}

}
