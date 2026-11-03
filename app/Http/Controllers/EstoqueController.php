<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoqueController extends Controller
{
  public function estoque_produtos_html(Request $request){
        return view('estoque_produto');
    }
}
