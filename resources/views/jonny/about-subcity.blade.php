
@extends('jonny.layouts.master-app')
@section('title', ucfirst($subcity->name) ?? '')
@section('subtitle',ucfirst($subcity->name).'-Summary')
@section('content')


<div class="row row-sm sr">

    @foreach($subcity->weredas as $wereda)
    <div class="col-md-3 col-lg-3">

        <div class="list list-row block">
            <div class="list-item" data-id="20" title="2" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                <div><a href="{{url('/sector/details/25/wereda/'.$wereda->id)}}" data-toggle-class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark active-primary text-muted"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></a>
                </div>
                <div><a href="{{url('/sector/details/25/wereda/'.$wereda->id)}}"><span class="w-40 avatar gd-warning">W</span></a>
                </div>
                <div class="flex"><a href="{{url('/sector/details/25/wereda/'.$wereda->id)}}" class="item-author text-color">{{$wereda->name}}</a>
                    
                </div>
            </div>

        </div>

    </div>

    @endforeach



    <div class="col-md-12 col-lg-12">
    
    
        <div class="card " title="6" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
            <div class="card-body" style=" height:auto; text-align: center;">
                



<br><br>
<div class="row">
                            <div class="col-12">
                            <div class=""><span class="badge badge-circle text-primary"></span>  <small class="text-muted">Very Good</small> <span class="badge badge-circle text-success"></span>  <small class="text-muted">Good</small>  <span class="badge badge-circle text-warning"></span>  <small class="text-muted">Medium</small>  <span class="badge badge-circle text-danger"></span>  <small class="text-muted">Bad</small></div>
                        </div>
                    


                    </div>
                </div>
            </div>
        
    
</div>

</div>

<div class="col-md-12 col-lg-12">
                    <div class="row row-sm">
        @foreach($subcity->sectors as $sector)
                        <div class="col-md-3">
                            <a href="{{url('/sector/details/'.$sector->id.'/'.$sector->type.'/'.$subcity->id)}}">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> መሬት ቢሮ </small> -->
                                    <div class="pt-3">
                                        <div style="height: 120px; background: url({{asset('jonny/svg/icon').$sector->id}}.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center"
                                                style="">
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
                                            <div class="text-highlight">{{$sector->stats['percentage']}}%</div><small class="h-1x">{{$sector->name}}</small>
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
