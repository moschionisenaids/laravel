<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class principalcontroller extends Controller
{

    public function bem_vindo_html(Request $request){
        return view('bemvindo');
    }
}
