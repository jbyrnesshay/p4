<?php

namespace Picnook\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{



    public function welcome(Request $request) {

    # Logged in users should not see the welcome page, send them to the books index instead.
    //if($request->user()) {
    	if (\Auth::user()){
        return redirect('/home');
    }
    

    else return view('welcome');
}

public function search() {
    return view('picnook.search');
}

}
