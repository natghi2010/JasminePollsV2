@extends('jonny.layouts.master-app')
@section('title','Sectors')
@section('subtitle','List')
@section('content')


<div class="row row row-sm sr">
<div class="col-md-12 col-lg-12">
    <div class="row row-sm">
    
        @foreach($sectors as $sector)
       
        <div class="col-md-3 clean-links">
        <a href="{{url('/sector/'.$sector->id.'/city')}}">
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
                            <canvas data-plugin="chartjs" id="chart-pie-{{$sector->id}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="d-md-flex">
                        <div class="flex">
                            <div class="text-highlight graphText" title="{{$sector->stats['percentage']}}">{{$sector->stats['percentage']}} %</div><small class="h-1x">{{$sector->name}}</small>
                        </div>
                        <div><small class="text-muted">+ 3.5%</small>
                        </div>
                    </div>
                    
                </div>
            </div>
          </a>
        </div>
       
        @endforeach
    </div>
</div>

@endsection