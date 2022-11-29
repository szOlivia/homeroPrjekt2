<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomersekletRogzites extends Controller
{
    public function getContent(){

        $termek = DB::select("SELECT * FROM termek ORDER BY nev ASC");

        return view("homersekletRogzites",["termek" => $termek]);
    }

    public function rogzites(Request $req){
        $req->validate(

            [
                "t_id" => "required|numeric|min:1",
                "homerseklet" => "required|numeric|min:-30|max:50"
            ],
            [
                "t_id.required" => "A mező kitöltése kötelező!",
                "t_id.numeric" => "Számot kell beirnia",
                "t_id.min" => "Válassz ki egy termet",
                "homerseklet.required" => "A mező kitöltése kötelező!",
                "homerseklet.numeric" => "Számot kell beirnia",
                "homerseklet.min" => "Minimum -30!",
                "homerseklet.max" => "Maximum 50!",
            ]

        );

        DB::insert("INSERT INTO 
        homersekletek 
        (t_id,homerseklet,datum_ido) VALUES 
        (?,?,?)",[$req->get('t_id'),$req->get('homerseklet'),date('Y-m-d H:i:s')]);

        return redirect("/homerseklet.-rogzites")->with("kész","A hőmérséglet rögzitése kész");

    }

}
