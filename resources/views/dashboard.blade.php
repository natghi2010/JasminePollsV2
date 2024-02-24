@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="">
    <input type="text" id="type" name="type" value="city" readonly hidden/>
    <input type="text" id="area_id" name="area_id" value="1" readonly hidden/>
</div>
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <input type="text" value="{{url('/')}}" id="masterUrl" hidden readonly/>
                <h1>Welcome / እንኳን ደህና መጣህ, </h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Line Chart -->
    <div class="col-sm-12 col-md-6">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Addis Ababa / አዲስ አበባ</h4>
                    @include('components.legends')
                </div>
            </div>
            <div class="panel-body">
                 @include('map-parts.addis-ababa-full',['status'=>$addisAbabaStatus,'value'=>$globalAverage])
            </div>
        </div>
    </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="col-sm-6 col-md-12">
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
        </div>
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
                
                  <a 
                  
                  href="{{url('/sector/city')}}/{{$sector->id}}/1">
                  <span 
                  data-pt-size="small" data-pt-classes="
                  btn toolyWidth
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
                  " 
                  {{-- Text --}}
                  data-pt-title="
                  {{$sector ? '<h5><u>City / ከተማ</u></h5>
                    <i>Average</i> : '.$sector->stats['average'].' / 5.00 <br/><br/>
                    <i>Percentage</i> : '.$sector->stats['percentage'].'%'
                  : ''}}
                   {{$sector->subcity ? '<h5><u>Subcity / ከተማ</u></h5>
                   <i>Average</i> : '.$sector->subcity->stats['average'].' / 5.00 <br/><br/>
                   <i>Percentage</i> : '.$sector->subcity->stats['percentage'].'%'
                   : ''}}
                   {{$sector->wereda ? '<h5><u>Wereda / ከተማ</u></h5>
                   <i>Average</i> : '.$sector->wereda->stats['average'].' / 5.00 <br/><br/>
                   <i>Percentage</i> : '.$sector->wereda->stats['percentage'].'%'
                   : ''}}

                   <h4><u>Overall Score<u></h4>
                    <h3 style='padding-top:-1px;'><strong>{{$sector->grandTotal}} %</strong></h3>
                   
                  " 
                  {{-- Text --}}
                  
                  
                  
                  class="protip sectorButton btn 
                  

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
                         @include('icon-parts.'.$sector->name)<br/>
                         {{$sector->name}}<br/>
                         {{$sector->grandTotal}}%
                            <strong style="font-size: 19px"></strong>
                    </span>
                   
                  </a>
                  @endforeach
              

                @foreach($sectors as $sector)
                @php $colors = ['success','warning','danger','primary'] @endphp
                    {{-- <a href="{{url('/city/sector/'.$sector->id)}}"><span class="badge badge-{{$colors[rand(0,3)]}}">{{$sector->name}}</span></a> --}}
                @endforeach
            
        </div>
    </div>
</div>
  
    </div>
 
    
@endsection

