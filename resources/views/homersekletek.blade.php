@extends('layouts.master')
@section('title','Főoldal')
@section('content')
     @include('menu')
    <h1>Helló Hőmérsékletek</h1>
    <div class="contener">
        <div class="row">
            <div class="col-12">
                <div>
                    <table class="table table-sm table-dark table-striped table-hover">
                        <tr>
                            <th>#</th>
                            <th>Terem név</th>
                            <th>Hőmérséglet</th>
                            <th>Rögzítés ideje</th>
                        </tr>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->h_td}}</td>
                            <td>{{$item->nev}}</td>
                            <td>{{$item->homerseglet}}</td>
                            <td>{{$item->datum_ido}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection