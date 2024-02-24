
@extends('jonny.layouts.master-app')
@section('title', $sector->name ?? '')
@section('subtitle','Summary')
@section('content')


    <div class="row row-sm sr">

        <div class="col-md-12 col-lg-12">
            <div class="row row-sm">
            
          @if($sector->city)
                <div class="col-md-3">
                <a href="/sector/details/{{$sector->id}}/city">
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
                                    <canvas data-plugin="chartjs" id="chart-pie-resultText-city"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div class="flex">
                                    <div class="text-highligh graphText" id="resultText-city" title="{{$sector->city['percentage']}}">{{$sector->city['percentage']}} %</div><small class="h-1x">City</small>
                                </div>
                                <div><small class="text-muted">+ 3.5%</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </a>
                </div>
        @endif

        @if($sector->subcity)
                <div class="col-md-3">
                    <a href="/sector/{{$sector->id}}/subcity">
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
                                    <canvas data-plugin="chartjs" id="chart-pie-resultText-subcity"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div class="flex">
                                    <div id="resultText-subcity" class="text-highlight graphText resultText-subcity" title="{{$sector->subcity['percentage']}}">{{$sector->subcity['percentage']}} %</div><small class="h-1x">Subcity</small>
                                </div>
                                <div><small class="text-muted">+ 3.5%</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </a>
                </div>
            @endif()
                @if(isset($sector->wereda))
                <div class="col-md-3">
                <a href="/sector/{{$sector->id}}/wereda">
                    
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
                                    <canvas data-plugin="chartjs" id="chart-pie-resultText-wereda"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <div class="flex">
                                    <div id="resultText-wereda" class="text-highlight graphText" title="{{$sector->subcity['percentage']}}">{{$sector->wereda['percentage']}} %</div><small class="h-1x">Wereda</small>
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
