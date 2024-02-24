@extends('layouts.master')
@section('title','Subcity')


@section('content')

<div class="row">
    <!-- Line Chart -->
    <div class="col-sm-12 col-md-6">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Addis Ababa Subcities</h4>
                    @include('components.legends')
                </div>
            </div>
            <div class="panel-body">
                <svg
xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750.06 662.94">
<defs>
    <style>.cls-1{fill:#C0C0C0;}</style>
</defs>

@foreach($subcities as $subcity)
@include('map-parts.'.$subcity->name,['status'=>$subcity->status,'id'=>$subcity->id])
{{-- @include('map-parts.Addis Ketema',['status'=>'good'])
@include('map-parts.Arada',['status'=>'good'])
@include('map-parts.Kirkos',['status'=>'good'])
@include('map-parts.Gullele',['status'=>'good'])
@include('map-parts.Yeka',['status'=>'good'])
@include('map-parts.Bole',['status'=>'danger'])
@include('map-parts.Nefas-Silk Laphto',['status'=>'good'])
@include('map-parts.Kolfe-Keranio',['status'=>'good'])
@include('map-parts.Akaki-Kality',['status'=>'danger']) --}}
@endforeach
</svg>
            </div>
        </div>
    </div>
    </div>
    <div class="col-sm-12 col-md-6">
        {{-- <div class="col-sm-6 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Addis Ababa Average By Subcity</h4>
                        
                    </div>
                </div>
                <div class="panel-body">
                    <div id="dashboardChart"></div>
                </div>
    </div>
        </div> --}}
    <div class="col-sm-6 col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Addis Ababa Average By Sector / አጠቃላይ እርካታ በዘርፉ</h4>
                    @include('components.legends')
                </div>
            </div>
            <div class="panel-body special-icons">
                @foreach($sectors as $sector)
                
                  <a href="{{url('/sector/subcity')}}/{{$sector->id}}/1">
                  <span class="sectorButton btn 

                  @if($sector->stats['status'] == 'vgood')
                  btn-success
                  @endif
                  @if($sector->stats['status'] == 'good')
                  btn-good
                  @endif
                  @if($sector->stats['status'] == 'medium')
                  btn-warning
                  @endif
                  @if($sector->stats['status'] == 'bad')
                  btn-danger
                  @endif
                  margin-10 col-md-3 col-xs-4">
                         @include('icon-parts.subcity.'.$sector->name,["status"=>$sector->stats['status']])<br/>
                         {{$sector->name}}<br/>
                         {{$sector->stats['percentage']}}%
                            <strong style="font-size: 19px"></strong>
                    </span>
                   
                  </a>
                  @endforeach
       
        </div>
    </div>
</div>
@endsection