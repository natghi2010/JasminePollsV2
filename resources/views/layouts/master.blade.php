<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
   @include('components.style')
</head>

<body>
    <input type="text" value="{{url('/johnny')}}" id="masterUrl" hidden readonly/>

    <!-- /# sidebar -->
    @include('components.sidebar')

    @include('components.header')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">

                                <h1>Welcome / እንኳን ደህና መጣህ, </h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div> --}}
                <!-- /# row -->
                <div id="main-content">

                  {{-- Content --}}
                    @yield('content')

                    @include('components.footer')
                </div>
            </div>
        </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('components.scripts')

</body>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('.datatable').DataTable();
} );
</script>

</html>
