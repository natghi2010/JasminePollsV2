@extends('jonny.layouts.master-app')
@section('title','Addis Ababa Sub City')

@section('content')
 


<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>

        <div class="page-content page-container" id="page-content">
            <div class="padding" style="padding: 9px;">
                <div class="row row-sm sr">
                    <div class="col-md-12 col-lg-12 ">


                        <div class="card ">
                            <div class="card-body" style=" height:auto; text-align: center;">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1190.55 841.89" width="600"
                                    class="hideformobile">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #e4e4e9;
                                            }
                                        </style>
                                    </defs>
                                    {{-- <title>Addis Ababa Map</title> --}}
                           
                                    @foreach($subcities as $subcity)
                                       
                                {{-- @if($subcity->id == 11)
                                          @continue
                                 @endif --}}


                                        @include('jonny.map-parts.'.$subcity->name,['status'=>$subcity->status,'id'=>$subcity->id])
                            
                            
                                @endforeach
                                  
                                </svg>



                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1190.55 841.89" width="100%"
                                    class="hidefordesktop">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #e4e4e9;
                                            }
                                        </style>
                                    </defs>
                                    <title>Addis Ababa Map</title>

                                                @foreach($subcities as $subcity)
                                                @if($subcity->id == 11)
                                                @continue
                                                @endif
                                            @include('jonny.map-parts.'.$subcity->name,['status'=>$subcity->status,'id'=>$subcity->id])
                                        @endforeach
                                </svg>


                                <br><br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class=""><span class="badge badge-circle text-primary"></span>
                                            <small class="text-muted">Very Good</small> <span
                                                class="badge badge-circle text-success"></span> <small
                                                class="text-muted">Good</small> <span
                                                class="badge badge-circle text-warning"></span> <small
                                                class="text-muted">Medium</small> <span
                                                class="badge badge-circle text-danger"></span> <small
                                                class="text-muted">Bad</small></div>
                                    </div>



                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

            <div class="row row-sm sr">


                <div class="col-md-12">
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Subcity Sectors</div>
                                <div class="card-body">
                                    <div id="" class="pos-rlt" style="height: 240px">
                                        <canvas data-plugin="chartjs" id="chart-bar-subcity-sectors"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="row row-sm">
        @foreach($sectors as $sector)

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






            </div>
        </div>
    </div>
</div>
@endsection