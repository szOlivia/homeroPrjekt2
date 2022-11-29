<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Aktualis extends Controller
{
    public function getContent(){
        $aktualis = DB::select("
        SELECT termek.nev, homersekletek.datum_ido,
        (SELECT homerseklet
        FROM homersekletek 
        WHERE homersekletek.t_id=termek.t_id 
        ORDER BY h_id DESC LIMIT 1) as homerseklet 
        FROM termek 
        INNER JOIN homersekletek ON (termek.t_id=homersekletek.t_id) 
        GROUP BY termek.t_id 
        ORDER BY homersekletek.h_id DESC");
        $lat ="46.08333";
        $lon = "18.23333";
        $i = $this->idojaras($lat,$lon);
        return view("welcome",["aktualis"=> $aktualis]);
    }
    public function idojaras($lat,$lon){
        $apiKey ="360fc091e9b3af2707606bdacba0aa3";
        $url ="https://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon".$lon."&appid=".$apiKey;

        $ch =curl_init();
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_VERBOSE,0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        $valasz = curl_exec($ch);
        curl_close($ch);
        $idojarasAdatok = json_decode($valasz,true);
        return $idojarasAdatok;
    }
}