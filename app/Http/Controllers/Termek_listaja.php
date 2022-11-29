<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Termek_listaja extends Controller
{
    public function getContent(){
        $termek_lista = DB::select("SELECT termek.t_id, termek.nev WHERE termek
        ORDER BY termek.t_id DESC ");
     return view("welcome",["termek_lista"=> $termek_lista]);
    }
}
