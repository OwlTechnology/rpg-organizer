<?php

namespace App\Http\Controllers\StaticContent\Systems;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Dnd5Controller extends Controller{

    public function overview() {
    	return view("static-content.dnd5.overview");
    }

    public function monstersManualList() {
    	return view("static-content.dnd5.monstersManualList");
    }

}
