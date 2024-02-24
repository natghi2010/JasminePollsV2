<div id="header" class="page-header">
    <div class="navbar navbar-expand-lg">
        <!-- brand -->
        <a href="index.html" class="navbar-brand d-lg-none">
            <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <g class="loading-spin" style="transform-origin: 256px 256px">
                    <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                </g>
            </svg>
            <!-- <img src="{{asset('jonny/img/logo.png')}}" alt="..."> --> <span class="hidden-folded d-inline l-s-n-1x d-lg-none">Jasmine</span> 
        </a>
        <!-- / brand -->
        <!-- Navbar collapse -->
        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
            <form class="input-group m-2 my-lg-0">
                <div class="input-group-prepend">
                    <button type="button" class="btn no-shadow no-bg px-0 text-inherit"><i data-feather="search"></i>
                    </button>
                </div>
                <input id="searchBar" type="text" class="form-control no-border no-shadow no-bg typeahead" placeholder="Search components..." data-plugin="typeahead" data-api="{{url('search/suggestions')}}">
            </form>
        </div>
        <ul class="nav navbar-menu order-1 order-lg-2">
            <li class="nav-item d-none d-sm-block"><a class="nav-link px-2" data-toggle="fullscreen" data-plugin="fullscreen"><i data-feather="maximize"></i></a>
            </li>
            
            <!-- Notification -->
            <li class="nav-item dropdown"><a class="nav-link px-2 mr-lg-2" data-toggle="dropdown"><i data-feather="bell"></i> <span class="badge badge-pill badge-up bg-primary">4</span> </a>
                <!-- dropdown -->
                <div class="dropdown-menu dropdown-menu-right mt-3 w-md animate fadeIn p-0">
                    <div class="scrollable hover" style="max-height: 250px">
                        <div class="list list-row">
                            <div class="list-item" data-id="6">
                                <div><a href="#"><span class="w-32 avatar gd-danger"><img src="{{asset('jonny/img/a6.jpg')}}" alt="."></span></a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">Just saw this on the <a href="#">@eBay</a> dashboard, dude is an absolute unit.</div>
                                </div>
                            </div>
                            <div class="list-item" data-id="12">
                                <div><a href="#"><span class="w-32 avatar gd-info">A</span></a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x"><a href="#">Support</a> team updated the status</div>
                                </div>
                            </div>
                            <div class="list-item" data-id="8">
                                <div><a href="#"><span class="w-32 avatar gd-success"><img src="{{asset('jonny/img/a8.jpg')}}" alt="."></span></a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">The biggest software developer conference</div>
                                </div>
                            </div>
                            <div class="list-item" data-id="4">
                                <div><a href="#"><span class="w-32 avatar gd-success"><img src="{{asset('jonny/img/a4.jpg')}}" alt="."></span></a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">Big News! Introducing <a href="#">NextUX</a> Enterprise 2.1 - additional #Windows Server support</div>
                                </div>
                            </div>
                            <div class="list-item" data-id="11">
                                <div><a href="#"><span class="w-32 avatar gd-info">K</span></a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">Prepare the documentation for the <a href="#">Fitness app</a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item" data-id="2">
                                <div><a href="#"><span class="w-32 avatar gd-primary"><img src="{{asset('jonny/img/a2.jpg')}}" alt="."></span></a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">Can data lead us to making the best possible decisions?</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex px-3 py-2 b-t">
                        <div class="flex"><span>6 Notifications</span>
                        </div><a href="#">See all <i class="fa fa-angle-right text-muted"></i></a>
                    </div>
                </div>
                <!-- / dropdown -->
            </li>
            <!-- User dropdown menu -->
            <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color"><span class="avatar w-24" style="margin: -2px"><img src="{{asset('jonny/img/a0.jpg')}}" alt="..."></span></a>
                <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn"><a class="dropdown-item" href="page.profile.html"><span>{{auth()->user()->name}}</span> </a><a class="dropdown-item" href="page.price.html"><span class="badge bg-success text-uppercase">Upgrade</span> <span>to Pro</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="page.profile.html"><span>Profile</span> </a><a class="dropdown-item d-flex" href="page.invoice.html"><span class="flex">Invoice</span> <span><b class="badge badge-pill gd-warning">5</b></span> </a><a class="dropdown-item" href="page.faq.html">Need help?</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="page.setting.html"><span>Account Settings</span> </a><a class="dropdown-item" href="{{ route('logout')}}">Sign out</a>
                </div>
            </li>
            <!-- Navarbar toggle btn -->
            <li class="nav-item d-lg-none"><a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class data-target="#navbarToggler"><i data-feather="search"></i></a>
            </li>
            <li class="nav-item d-lg-none"><a class="nav-link px-1" data-toggle="modal" data-target="#aside"><i data-feather="menu"></i></a>
            </li>
        </ul>
    </div>
</div>