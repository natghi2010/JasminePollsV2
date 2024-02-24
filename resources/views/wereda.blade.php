@extends('layouts.master')
@section('title',$wereda->name)


@section('content')
<div class="">
    <input type="text" id="type" name="type" value="wereda" readonly hidden/>
    <input type="text" id="area_id" name="area_id" value="{{$wereda->id}}" readonly hidden/>
</div>
   <div class="row">
    <div class="col-lg-6">
        <div class="card alert">
            <div class="card-header">
                <h3><b>Sectors / ዘርፍ</b></h3>
                <div class="card-header-right-icon">
                    <ul>
                        {{-- <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i> --}}
                            {{-- <ul class="card-option-dropdown dropdown-menu">
                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                            </ul> --}}
                        </li>
                        {{-- <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div id="dashboardChart"></div>
           
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="table-responsive">
            <table class="table datatable">
                <thead class="text-left">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @php $count = 1; @endphp
                    @foreach($sectors as $sector)

                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$sector->name}}</td>
                        <td class="text-danger">{{rand(1,5)}}</td>
                    </tr>
                    @php $count++ @endphp
                    @endforeach

                  
                    {{-- <tr>
                        <th scope="row">2</th>
                        <td>Wereda 02</td>
                        <td class="text-warning">2.45</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Wereda 03</td>
                        <td class="text-success">4.45</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
   </div>
@endsection