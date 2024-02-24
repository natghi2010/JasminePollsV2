@extends('jonny.layouts.master-app')
@section('title',$sector->name)
@section('subtitle',$sector->type)
@section('content')

<div class="row row-sm sr">
    <div class="col-md-12 col-lg-12">
        <div class="row row-sm">
        
        @foreach($subcities as $subcity)
            <div class="col-md-3">
                <a href="{{url('/sector/details/'.$sector->id.'/'.$sector->type.'/'.$subcity->id)}}">
                <div class="card" style="width: 100%; visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;" alt="2">
                    <div class="card-body text-center"><!--<small class="text-muted"> መሬት ቢሮ </small> -->
                        <div class="pt-3">
                            <div style="height: 120px; background: url({{asset('/jonny/svg/subcity'.$subcity->id.'.svg')}}) center no-repeat;" class="pos-rlt">
                                <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center" style="">
                                    <div>

                                        <!--<div class="text-highlight text-md"><span>56</span>
                                        </div><small class="text-muted">Bad</small> -->
                                    </div>
                                </div>
                                <canvas id=""></canvas>

                            </div>

                        </div>
                            <br>
                      {{ucfirst($subcity->name)}}
                    </div>
                </div>
            </a>


            </div>
        @endforeach


            

            



        



            
        </div>
    </div>

</div>

@endsection