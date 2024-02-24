<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="description" content="Responsive, Bootstrap, BS4">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<!-- style -->
	<link rel="stylesheet" href="{{asset('jonny/css/site.min.css')}}">
	{{-- <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css"/> --}}
</head>

<body class="layout-row">
	<input value="{{asset('/jonny')}}/" id="masterUrl" hidden readonly/>
	<input value="{{url('/')}}" id="generalUrl" hidden readonly/>

	@include('jonny.components.sidebar')
	<!-- ############ Aside END-->
	<div id="main" class="layout-column flex">
		<!-- ############ Header START-->
		@include('jonny.components.header')
		<!-- ############ Footer END-->
		<!-- ############ Content START-->
		<div id="content" class="flex">
			<!-- ############ Main START-->
			<div>
				<div class="page-hero page-container" id="page-hero">
					<div class="padding d-flex">
						<div class="page-title">
							<h2 class="text-md text-highlight">@yield('title')</h2><small class="text-muted">@yield('subtitle')</small>
						</div>
						<div class="flex"></div>

					</div>
				</div>
				<div class="page-content page-container" id="page-content">
					<div class="padding" style="padding: 9px;">
						@yield('content')
					</div>
				</div>
			</div>
			<!-- ############ Main END-->
		</div>
		<!-- ############ Content END-->
		<!-- ############ Footer START-->
		<div id="footer" class="page-footer hide">
			<div class="d-flex p-3"><span class="text-sm text-muted flex">&copy; Copyright. Jasmine Addis</span>
				<div class="text-sm text-muted">Version 1.1.2</div>
			</div>
		</div>
		<!-- ############ Footer END-->
	</div>
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/axios.min.js')}}"></script>
	<script src="{{asset('jonny/js/site.min.js')}}"></script>




</body>

</html>
