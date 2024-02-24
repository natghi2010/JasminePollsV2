@extends('jonny.layouts.master-app')
@section('title','Dashboard')
@section('subtitle','Welcome '.auth()->user()->name)


@section('content');

<Style>
    .margintop
    {
      margin-top: 200px;
    }

    @media only screen and (max-width: 600px) {
  .margintop
    {
      margin-top: 0px;
    }
}
  </Style>

<div class="row row-sm sr">

    <div class="col-md-12 col-lg-12">


        <div class="card ">
          <div class="card-body" style="">

            <div class="row">
              <div class="col-md-6">

                    @include("jonny.components.addisAbabaMap",['addisAbabaStatus'=>$addisAbabaStatus ?? ''])


                </div>

              <div class="col-md-6">
            <div class="px-4">

              <div class="row text-center">
                <h5 class="card-title text-lg margintop">Addis Ababa</h5>
              </div>

              <div class="row text-center">
                <span class="text-primary"><button class="btn w-sm mb-1 btn-primary">Click Here</button></span>
              </div>

              <div class="row text-center">
                <div class="text-muted text-lg
                @if($addisAbabaStatus == 'bad')
                text-danger
                @endif
                @if($addisAbabaStatus == 'medium')
                text-warning
                @endif
                @if($addisAbabaStatus == 'good')
                text-success
                @endif
                @if($addisAbabaStatus == 'vgood')
                text-primary
                @endif


                ">{{$globalAverage}}%</div>
              </div>

              <div class="row text-center">
                @include('jonny.components.colorcodes')
              </div>



              </div>
            </div>






              </div>
            </div>
          </div>


    </div>

  </div>


    </div>

    <div class="row row-sm sr">




    <div class="col-md-6">
            <div class="row row-sm">
                <div class="col-md-12">
            <div class="card">
                <div class="card-header">Subcities</div>
                <div class="card-body">
                    <div id="" class="pos-rlt" style="height: 240px">
                        <canvas data-plugin="chartjs" id="chart-bar-subcities"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-6">
            <div class="row row-sm">
                <div class="col-md-12">
            <div class="card">
                <div class="card-header">Questions</div>
                <div class="card-body">
                    <div id="" class="pos-rlt" style="height: 240px">
                        <canvas data-plugin="chartjs" id="chart-bar-questions"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="row row-sm">

                @foreach($sectors as $sector)

                <div class="col-md-3 col-xs-6 clean-links">
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






    </div>

@endsection
