@extends('jonny.layouts.master-app')
@section('title',$sector->name)
@section('subtitle',ucfirst($area->name ?? '') )
@section('content')
<div class="row row-sm sr">
    <div class="col-md-12 col-lg-12">

        <div class="table-responsive">

            <div id="accordion" class="mb-12">
            @php $no = 1 @endphp
        @foreach($sector->questions as $question)

            <div class="card mb-1">
                <div class="card-header no-border" id="headingOne"><a href="#" data-toggle="collapse" data-target="#collapse{{$question->id}}" aria-expanded="false" aria-controls="collapseOne">

                <div class="row">
                    <div class="col-md-1 text-center">
                    <span class="w-32 avatar gd-info">Q{{$no}}</span>
                     </div>

                     <div class="col-md-7 text-center">
                    <span class="item-title text-color">{{$question->question}}</span>
                     </div>
                     <div class="col-md-1 text-center"><span class="item-amount d-none d-sm-block text-sm text-{{$question->stats['statusColorClass']}}">{{$question->stats['percentage']}}%</span></div>
                     <div class="col-md-3 text-center">
                    <span class="item-amount d-none d-sm-block text-sm">
                        <span class="text-success">
                        <i data-feather="users"></i>
                        </span>
                        &nbsp;&nbsp;&nbsp;
                       20
                    </span>
                     </div>
                 </div>



                </a>
                </div>
                <div id="collapse{{$question->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                        <div class="row">
                                <div class="col-md-3">
                <div class="card" style="width: 100%">
                    <div class="card-body text-center"><!--<small class="text-muted"> ነግድ ቢሮ </small>-->
                        <div class="pt-3">
                            <div style="height: 120px;" class="pos-rlt">
                                <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="text-highlight text-md graphText" id="{{$question->id}}" title="{{$question->stats['percentage']}}"><span>{{$question->stats['percentage']}}</span>
                                        </div><small class="text-muted">Very Good</small>
                                    </div>
                                </div>
                                <canvas data-plugin="chartjs" id="chart-pie-{{$question->id}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" style="width: 100%;">
                    <div class=" text-center">
                        <div class="d-md-flex">
                            <div class="flex">
                                <span class="text-info"> {{$sector->vgood}}</span>
                                    <small class="text-muted text-info"><i data-feather="users"></i>Very Good</small>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card" style="width: 100%">
                    <div class="card-body text-center"><!--<small class="text-muted"> ነግድ ቢሮ </small>-->
                        <div class="pt-3">
                            <div style="height: 120px;" class="pos-rlt">
                                <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="text-highlight text-md graphText" id="{{$question->id}}-{{$sector->good}}" title="{{($sector->total == 0 ? 1 : $sector->good/$sector->total)*100}}"><span>{{$sector->good}} %</span>
                                        </div><small class="text-muted">Good</small>
                                    </div>
                                </div>
                                <canvas data-plugin="chartjs" id="chart-pie-{{$question->id}}-{{$sector->good}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" style="width: 100%;">
                    <div class=" text-center">
                        <div class="d-md-flex">
                            <div class="flex">
                                <span class="text-success"> {{$sector->good}} %</span>
                                    <small class="text-muted text-success"><i data-feather="users"></i>Good</small>
                            </div>

                        </div>

                    </div>
                </div>
            </div>



            <div class="col-md-3">
                <div class="card" style="width: 100%">
                    <div class="card-body text-center"><!--<small class="text-muted"> ነግድ ቢሮ </small>-->
                        <div class="pt-3">
                            <div style="height: 120px;" class="pos-rlt">
                                <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="text-highlight text-md graphText" id="{{$question->id}}-{{$sector->medium}}" title="{{$sector->medium}}"><span>{{$sector->medium}}</span>
                                        </div><small class="text-muted">Medium</small>
                                    </div>
                                </div>
                                <canvas data-plugin="chartjs" id="chart-pie-{{$question->id}}-{{$sector->medium}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" style="width: 100%;">
                    <div class=" text-center">
                        <div class="d-md-flex">
                            <div class="flex">
                                <span class="text-warning"> 20</span>
                                    <small class="text-muted text-warning"><i data-feather="users"></i>Medium</small>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card" style="width: 100%">
                    <div class="card-body text-center"><!--<small class="text-muted"> ነግድ ቢሮ </small>-->
                        <div class="pt-3">
                            <div style="height: 120px;" class="pos-rlt">
                                <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="text-highlight text-md graphText" id="{{$question->id}}-{{$sector->bad}}" title="{{$question->bad}}"><span>{{$sector->bad}}</span>
                                        </div><small class="text-muted">Bad</small>
                                    </div>
                                </div>
                                <canvas data-plugin="chartjs" id="chart-pie-{{$question->id}}-{{$sector->bad}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" style="width: 100%;">
                    <div class=" text-center">
                        <div class="d-md-flex">
                            <div class="flex">
                                <span class="text-danger"> 20</span>
                                    <small class="text-muted text-danger"><i data-feather="users"></i>Bad</small>
                            </div>

                        </div>

                    </div>
                </div>
            </div>



                        </div>

                    </div>
                </div>
            </div>
            @php $no++; @endphp
            @endforeach
            <!--end of Question-->

            <!-------------------------------------------------------------------------------------------------------------------->



            <!-------------------------------------------------------------------------------------------------------------------->

        </div>


</div>





</div>

</div>
@endsection
