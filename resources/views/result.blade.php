@extends('layouts.app')
<style>
    svg{
        width: 50%!important;
    }
 #Lideta{
     color:white;
 }
    .great{
        fill: green !important;
    }
    .great:hover{
        fill:#66ff00 !important;
    }
    .danger{
        fill:orange !important;
    }
    .bad{
        fill: red !important;
        background:red;
        z-index: 400;
    }
    .bad:hover{
        fill: red !important;
        background:red;
        z-index: 400;
    }
    .blue{
        fill: navy !important;
    }

</style>

@section('content')
<div class="row">
<div class="col-md-4">
    <h2>አጠቃላይ እርካታ</h2>
    <div id="chartPie"></div>
</div>
<div class="col-md-8">
    <h2>አፈፃፀም በአመታት ውስጥ</h2>
    <div id="chartLine"></div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <svg
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750.06 662.94">
        <defs>
            <style>.cls-1{fill:#C0C0C0;}</style>
        </defs>

        
        @include('map-parts.lideta',['status'=>'bad'])
        @include('map-parts.addis_ketema',['status'=>'great'])
        @include('map-parts.arada',['status'=>'danger'])
        @include('map-parts.kirkos',['status'=>'blue'])
        @include('map-parts.Gulele',['status'=>'blue'])
        @include('map-parts.Yeka',['status'=>'blue'])
        @include('map-parts.Bole',['status'=>'blue'])
        @include('map-parts.Nefas',['status'=>'blue'])
        @include('map-parts.Kolfe',['status'=>'blue'])
        @include('map-parts.Akaki',['status'=>'blue'])

    </svg>
    

    </div>
</div>

@endsection
