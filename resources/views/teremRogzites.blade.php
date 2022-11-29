@extends('layouts.master')
@section('title','Főoldal')
@section('content')
     @include('menu')
     <div class="container">
         <div class="row">
             <div class="col-12">
                <div class="bg-success p-3 rounded text-white">
                    <h1>Terem rögzítés</h1>

                    @if (session()->get('kesz'))
                        <div class="alert alert-success">
                            {{ session()->get('kesz') }}
                        </div>
                    @endif

                    <form method="POST">
                        @csrf
                        <div class="mt-3 mb-3">
                            <label for="nev">Terem neve:</label>
                            <input type="text" value="{{ old('nev') }}" name="nev" id="nev" class="form-control">    
                            @error('nev')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="szel_cm">Terem szélessége:</label>
                            <input type="number" value="{{ old('szel_cm') }}" name="szel_cm" id="szel_cm" class="form-control">    
                            @error('szel_cm')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="hossz_cm">Terem hosszúság:</label>
                            <input type="number" value="{{ old('hossz_cm') }}" name="hossz_cm" id="hossz_cm" class="form-control"> 
                            @error('hossz_cm')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror   
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="mag_cm">Terem magasság:</label>
                            <input type="number" value="{{ old('mag_cm') }}" name="mag_cm" id="mag_cm" class="form-control">  
                            @error('mag_cm')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror  
                        </div>
                        
                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-light">Adatok rögzítése</button>
                        </div>
                    </form>
                </div>
             </div>
         </div>
     </div>
    
@endsection