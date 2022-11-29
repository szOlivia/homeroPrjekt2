<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homersekletek;
use App\Http\Controllers\TeremRogzites;
use App\Http\Controllers\HomersekletRogzites;
use App\Http\Controllers\Aktualis;
use App\Http\Controllers\Termeklistaja;


Route::get('/',[Aktualis::class, "getContent"]);

Route::get("/homersekletek",[Homersekletek::class,"getContent"]);

Route::get("/terem-rogzites",[TeremRogzites::class,"getContent"]);
Route::post("/terem-rogzites",[TeremRogzites::class,"rogzites"]);

Route::get("/homerseklet-rogzites",[HomersekletRogzites::class,"getContent"]);
Route::post("/homerseklet-rogzites",[HomersekletRogzites::class,"rogzites"]);

Route::get('/teremlista',[Termeklistaja::class, "getContent"]);
Route::post('/terem-torles',[TeremRogzites::class, "teremTorles"]);