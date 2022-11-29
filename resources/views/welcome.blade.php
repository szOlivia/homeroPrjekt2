@extends('layouts.master')
@section('title','Főoldal')
@section('content')
    @include('menu')
     <div class="contenre">
         <div  class="row">
            <h1>Aktuális</h1>

            <div class="col-6">
                <div class="bg-dark text-white p-3">
                    <h1>Terlepűlés info</h1>
                    <select name="" id="telepules" class="form-select" >
                        @foreach ($telepulesek as $item)
                            <option value="{{$item->lat}}|{{$item->lon}}">{{$item->nev}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            @foreach ($aktualis as $item)
               <div class="col-3">
                   <div class=" text-center text-white rounded p-3
                   @if($item->homerseklet<=15)
                   bg-primary
                   @elseif($item->homerseklet>15 && $item->homerseklet<=18)
                   bg-success
                   @else
                   bg-danger
                   @endif
                   ">
                       <span class="fw-bold display-4">{{$item->homerseklet}}&deg;</span>
                       <br>
                       {{$item->nev}}
                       <br>
                        {{$item->datum_ido}}
                   </div>
               </div>
            @endforeach
         </div>
     </div>
    
@endsection