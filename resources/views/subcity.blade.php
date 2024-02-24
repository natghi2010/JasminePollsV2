@extends('layouts.master')
@section('title',ucfirst($subcity->name))
@section('content')
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ucfirst($subcity->name)}} </h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Addis Ababa Average By Sector / አጠቃላይ እርካታ በዘርፉ</h4>
                    @include("components.legends")
                   
                </div>
            </div>
            <div class="panel-body special-icons">
                @foreach($subcity->sectors as $sector)
                
                  <a href="{{url('/sector/subcity')}}/{{$sector->id}}/1">

                  <span class="sectorButton btn 
                  @if($sector->stats['status'] =='vgood')
                  btn-success
                  @endif
                  @if($sector->stats['status'] =='good')
                  btn-good
                  @endif
                  @if($sector->stats['status'] =='medium')
                  btn-warning
                  @endif
                  @if($sector->stats['status'] =='bad')
                  btn-danger
                  @endif
        
                   margin-10 col-md-3 col-xs-4">
                   
                         @include('icon-parts.subcity.'.$sector->name,['status'=>$sector->stats['status']])<br/>
                            {{$sector->name}}<br/>
                            <strong style="font-size: 19px">{{$sector->stats['average']}}</strong><br/>
                            <span style="font-size: 12px"><i class="ti-user"></i> {{$sector->stats['total_people']}}</span>
                  </span>
                   
                  </a>
                  @endforeach
              
            
            </div>
        </div>
        </div>
       
    <div class="col-lg-6 col-xs-12">
        <div class="card alert">
            <div class="card-header">
                <h3><b>{{ucfirst($subcity->name)}} Weredas</b></h3>
                <div class="card-header-right-icon">
                    <ul>
                        {{-- <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i> --}}
                            {{-- <ul class="card-option-dropdown dropdown-menu">
                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                            </ul> --}}
                        </li>
                        {{-- <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" style = "text-transform:capitalize;"> 
                    <table class="table">
                        <thead class="text-left">
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @php $i=1;@endphp
                        @foreach($subcity->weredas as $wereda)
                             <tr>
                                <td class="text-left"><a href="{{url('/wereda/'.$wereda->id)}}"> {{$wereda->name}}</a></td>
                            </tr>
                            @php $i++ @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
    </div>
 
@endsection