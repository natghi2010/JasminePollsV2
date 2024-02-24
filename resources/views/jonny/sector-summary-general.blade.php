
@extends('jonny.layouts.master-app')
@section('title', $sector->name ?? '')
@section('subtitle','Summary')
@section('content')


    <div class="row row-sm sr">

        <div class="col-md-12 col-lg-12">
            <div class="row row-sm">
            
       
                <div class="col-md-3">
                <a href="#">
                    <div class="card" style="width: 100%;">
                        <div class="card-body text-center"><!--<small class="text-muted"> መሬት ቢሮ </small> -->
                            <div class="pt-3">
                                <div style="height: 120px; background: url({{asset('jonny/svg/icon'.$sector->id.'.svg')}}) center no-repeat;" class="pos-rlt">
                                    <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center" style="">
                                        <div>

                                            <!--<div class="text-highlight text-md"><span>56</span>
                                            </div><small class="text-muted">Bad</small> -->
                                        </div>
                                    </div>
                                    <canvas data-plugin="chartjs" id="chart-pie-{{$sector->type}}-{{$sector->id}}"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div class="flex">
                                    <div class="text-highlight" id="result-text-{{$sector->type}}-{{$sector->id}}" title="{{$city['percentage']}}">{{$city['percentage']}} %</div><small class="h-1x">City</small>
                                </div>
                                <div><small class="text-muted">+ 3.5%</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3">
                <a href="/sector/1">
                    <div class="card" style="width: 100%;">
                        <div class="card-body text-center"><!--<small class="text-muted"> መሬት ቢሮ </small> -->
                            <div class="pt-3">
                                <div style="height: 120px; background: url({{asset('jonny/svg/icon1.svg')}}) center no-repeat;" class="pos-rlt">
                                    <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center" style="">
                                        <div>

                                            <!--<div class="text-highlight text-md"><span>56</span>
                                            </div><small class="text-muted">Bad</small> -->
                                        </div>
                                    </div>
                                    <canvas data-plugin="chartjs" id="chart-pie-1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div class="flex">
                                    <div class="text-highlight">{{$subcity['percentage']}} %</div><small class="h-1x">Subcity</small>
                                </div>
                                <div><small class="text-muted">+ 3.5%</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </a>
                </div>
                @if(!$wereda['isEmpty'])
                <div class="col-md-3">
                <a href="/sector/1">
                    <div class="card" style="width: 100%;">
                        <div class="card-body text-center"><!--<small class="text-muted"> መሬት ቢሮ </small> -->
                            <div class="pt-3">
                                <div style="height: 120px; background: url({{asset('jonny/svg/icon1.svg')}}) center no-repeat;" class="pos-rlt">
                                    <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center" style="">
                                        <div>

                                            <!--<div class="text-highlight text-md"><span>56</span>
                                            </div><small class="text-muted">Bad</small> -->
                                        </div>
                                    </div>
                                    <canvas data-plugin="chartjs" id="chart-pie-1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div class="flex">
                                    <div class="text-highlight">{{$wereda['percentage']}} %</div><small class="h-1x">Wereda</small>
                                </div>
                                <div><small class="text-muted">+ 3.5%</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </a>
                </div>
                @endif
               



            </div>
        </div>
        
    
        
    
        
        
    </div>

@endsection
