@extends('layouts.master')
@section('title','Főoldal')
@section('content')
     @include('menu')
    <div class="contener">
        <div class="row">
            <div class="col-12">
                <div>
                    <table class="table table-sm table-dark table-striped table-hover">
                        <tr>
                            <th>#</th>
                            <th>Terem név</th>
                            <th>Széleseg</th>
                            <th>Hossza</th>
                            <th>Magasság</th>
                            <th>törlés</th>
                            <th>modositás</th>
                        </tr>
                        @foreach ($list as $item)
                        <tr id="sor_{{$item->t_id}}">
                            <td>{{$item->t_id}}</td>
                            <td>{{$item->nev}}</td>
                            <td>{{$item->szel_cm}}</td>
                            <td>{{$item->hossz_cm}}</td>
                            <td>{{$item->mag_cm}}</td>
                            <td><button class="btn btn-danger" type="button" id="gomb_{{$item->t_id}}" onclick="teremTorles({{$item->t_id}});">törlés</button></td>
                            <td><button class="btn btn-success" type="button">modositás</button></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function teremTorles(tid){
           // $("#sor_"+tid).remove();
           $.ajax({
               url:"./terem-torles", 
               type:"POST",
               headers:{
                "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
               },
               data:{"tid":tid},
               cache:false,
               async:false,
               beforeSend:function(){
                   $("#gomb_"+tid).attr("disabled",true);
               },
               success:function(){
                   $("#sor_"+tid).remove();
               }
           });
        }
    </script>
@endsection