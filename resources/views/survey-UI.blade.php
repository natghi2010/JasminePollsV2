@extends('layouts.master')
@section('title','Survey')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="surveyElement"></div>
        <div id="surveyResult"></div>
        
<div class="contentarea" hidden>

    <div class="camera">
        <video id="video">Video stream not available.</video>
    </div>
    <div><button id="startbutton">Take photo</button></div>
    
    <canvas id="canvas"></canvas>
    <div class="output">
        <img id="photo" alt="The screen capture will appear in this box."> 
    </div>

</div>
    </div>
</div>
@endsection