@extends('jonny.layouts.master-app')
@section('title','Addis Ababa Sub City')

@section('content')
 


<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Addis Ababa Sub City</h2><small
                        class="text-muted">Welcome aboard, <strong>Jacqueline Reid</strong></small>
                </div>
                <div class="flex"></div>

            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding" style="padding: 9px;">
                <div class="row row-sm sr">
                    <div class="col-md-12 col-lg-12 ">

                        <div class="card ">
                            <div class="card-body" style=" height:auto; text-align: center;">


                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750.06 662.94" width="600"
                                    class="hideformobile">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #e4e4e9;
                                            }
                                        </style>
                                    </defs>
                                    <title>Addis Ababa Map</title>
                                    @foreach($subcities as $subcity)
                                    @include('jonny.map-parts.'.$subcity->name,['status'=>$subcity->status])
                                @endforeach
                                  
                                </svg>



                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750.06 662.94" width="100%"
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
                                            @include('jonny.map-parts.'.$subcity->name,['status'=>$subcity->status])
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


                        </div>

                        @endforeach
{{-- 

                        <div class="col-md-3">
                            <div class="card" style="width: 100%">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ነግድ ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon2.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!---<div class="text-highlight text-md"><span>68</span>
                                                        </div><small class="text-muted">Good</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">25%</div><small class="h-1x">ነግድ ቢሮ
                                            </small>
                                        </div>
                                        <div><small class="text-muted">- 2.0%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ገቢዎች ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon3.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!--<div class="text-highlight text-md"><span>67</span>
                                                        </div><small class="text-muted">GOOD</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">45%</div><small class="h-1x">ገቢዎች
                                                ቢሮ</small>
                                        </div>
                                        <div><small class="text-muted">+ 4.5%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 ">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ገቢዎች ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon4.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!--<div class="text-highlight text-md"><span>67</span>
                                                        </div><small class="text-muted">GOOD</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">45%</div><small class="h-1x">ስራ
                                                ፈጠራ</small>
                                        </div>
                                        <div><small class="text-muted">+ 4.5%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}



                        {{-- <div class="col-md-3 ">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ገቢዎች ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon5.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!--<div class="text-highlight text-md"><span>67</span>
                                                        </div><small class="text-muted">GOOD</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-5"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">45%</div><small class="h-1x">ቤቶች
                                                ኮርፓሬሽን</small>
                                        </div>
                                        <div><small class="text-muted">+ 4.5%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-3 ">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ገቢዎች ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon6.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!--<div class="text-highlight text-md"><span>67</span>
                                                        </div><small class="text-muted">GOOD</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-6"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">45%</div><small class="h-1x">ጽዳት
                                                ቢሮ</small>
                                        </div>
                                        <div><small class="text-muted">+ 4.5%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
 --}}


                        {{-- <div class="col-md-3 ">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ገቢዎች ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon12.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!--<div class="text-highlight text-md"><span>67</span>
                                                        </div><small class="text-muted">GOOD</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-7"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">45%</div><small class="h-1x">ቅሬታና አቤቱታ
                                            </small>
                                        </div>
                                        <div><small class="text-muted">+ 4.5%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>





                        <div class="col-md-3 ">
                            <div class="card" style="width: 100%;">
                                <div class="card-body text-center">
                                    <!--<small class="text-muted"> ገቢዎች ቢሮ </small>-->
                                    <div class="pt-3">
                                        <div style="height: 120px;background: url(svg/icon14.svg) center no-repeat;"
                                            class="pos-rlt">
                                            <div
                                                class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <!--<div class="text-highlight text-md"><span>67</span>
                                                        </div><small class="text-muted">GOOD</small>-->
                                                </div>
                                            </div>
                                            <canvas data-plugin="chartjs" id="chart-pie-8"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight">45%</div><small class="h-1x">የምግብ
                                                መድሃኒትና</small>
                                        </div>
                                        <div><small class="text-muted">+ 4.5%</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}





                    </div>
                </div>






            </div>
        </div>
    </div>
</div>
@endsection