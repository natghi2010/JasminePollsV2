
@extends('jonny.layouts.master-app')
@section('title', $sector->name ?? '')
@section('subtitle',ucfirst($subcity->name).'-Summary')
@section('content')


  <div class="row row-sm sr">

    @foreach($weredas as $wereda)
    <a href="{{url('/sector/details/'.$sector->id.'/'.$sector->type.'/'.$wereda->id)}}">
							<div class="col-md-3 col-lg-3">

								<div class="list list-row block">
									<div class="list-item" data-id="20"  style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
										<div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark active-primary text-muted"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
										</div>
										<div><a href="{{url('/sector/details/'.$sector->id.'/'.$sector->type.'/'.$wereda->id)}}"><span class="w-40 avatar gd-info">W</span></a>
										</div>
                                        <div class="flex"><a href="{{url('/sector/details/'.$sector->id.'/'.$sector->type.'/'.$wereda->id)}}" class="item-author text-color text-{{$wereda->stat['statusColorClass']}}">{{$wereda->name}} <br/>
                                            <strong class="text-{{$wereda->stat['statusColorClass']}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$wereda->stat['percentage']}}%</strong>
                                        </a>
											
										</div>
									</div>
							
									
								</div>

                            </div>
    </a>
        @endforeach
                            

				

						</div>
@endsection
