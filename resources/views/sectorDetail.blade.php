@extends('layouts.master')
@section('title','Sector')


@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <h2>{{$sector->name}}</h2>
            
            @foreach($sector->questions as $question)
                <p>{{$question->question}} - {{$question->stats['average']}} (<i class="ti-user"></i>  {{$question->stats['total']}})</p>
            @endforeach
           
        </div>
    </div>
<div>


@endsection