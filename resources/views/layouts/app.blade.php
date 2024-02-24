<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Survey</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/survey-knockout@1.8.20/survey.min.css" type="text/css" rel="stylesheet"/>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/apexcharts.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/4.2.8/css/tooltipster.bundle.css">
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/tooltipster/4.2.8/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css">

  
    
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Survey</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ route('survey') }}">{{ __('Survey') }}</a></li>
        <li><a href="{{ route('results') }}">{{ __('Results') }}</a></li>
        <li><a href="{{ route('results') }}">{{ __('Logout') }}</a></li>
      </ul>
    </div>
  </nav>
  <input type="text" id="url" value="{{url('/api')}}/" hidden/>
<body class="container">
    @yield('content')
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src="https://unpkg.com/survey-jquery@1.8.20/survey.jquery.min.js"></script>
<script src="{{url('/js/apexcharts.min.js')}}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.js"></script>


<script>
   
        $('.tooltip').tooltipster({
        theme: 'tooltipster-punk',
        contentAsHTML: true
        });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
<script src="{{url('/js/index.js')}}"></script>

<script>
  /* JS comes here */
  (function() {

      var width = 320; // We will scale the photo width to this
      var height = 0; // This will be computed based on the input stream

      var streaming = false;

      var video = null;
      var canvas = null;
      var photo = null;
      var startbutton = null;

      function startup() {
          video = document.getElementById('video');
          canvas = document.getElementById('canvas');
          photo = document.getElementById('photo');
          startbutton = document.getElementById('startbutton');

          navigator.mediaDevices.getUserMedia({
                  video: true,
                  audio: false
              })
              .then(function(stream) {
                  video.srcObject = stream;
                  video.play();
              })
              .catch(function(err) {
                  console.log("An error occurred: " + err);
              });

          video.addEventListener('canplay', function(ev) {
              if (!streaming) {
                  height = video.videoHeight / (video.videoWidth / width);

                  if (isNaN(height)) {
                      height = width / (4 / 3);
                  }

                  video.setAttribute('width', width);
                  video.setAttribute('height', height);
                  canvas.setAttribute('width', width);
                  canvas.setAttribute('height', height);
                  streaming = true;
              }
          }, false);

          startbutton.addEventListener('click', function(ev) {
              takepicture();
              ev.preventDefault();
          }, false);

          clearphoto();
      }


      function clearphoto() {
          var context = canvas.getContext('2d');
          context.fillStyle = "#AAA";
          context.fillRect(0, 0, canvas.width, canvas.height);

          var data = canvas.toDataURL('image/png');
          photo.setAttribute('src', data);
      }

      function takepicture() {
          var context = canvas.getContext('2d');
          if (width && height) {
              canvas.width = width;
              canvas.height = height;
              context.drawImage(video, 0, 0, width, height);

              var data = canvas.toDataURL('image/png');
              photo.setAttribute('src', data);
          } else {
              clearphoto();
          }
      }

      window.addEventListener('load', startup, false);
  })();
  </script>
</html>
