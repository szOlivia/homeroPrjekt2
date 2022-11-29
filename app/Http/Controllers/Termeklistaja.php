<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Termeklistaja extends Controller 
{
    public function getContent(){
        $list = DB::select("SELECT t_id, nev, szel_cm, hossz_cm, mag_cm FROM termek");
     return view("teremlistaja",["list"=> $list]);
    }
}
