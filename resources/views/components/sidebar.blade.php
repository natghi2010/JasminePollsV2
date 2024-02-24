
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li class="label">Main</li>

                    <li><a href="{{url('/dashboard')}}"><i class="ti-home"></i> Dashboard / ዳሽቦርድ </a></li>
                  
                  
                    
                   
                    {{-- <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
                    <li><a href="app-profile.html"><i class="ti-user"></i> Profile</a></li>
                    <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Widget</a></li> --}}
         
                  

                            <li class="label">City</li>
                            <li><a href="{{url('/dashboard')}}"><i class="ti-world"></i> City / ዳሽቦርድ </a></li>
                            <li class="label">Subcity</li>
                            <li><a href="{{url('/list/subcity/')}}"><i class="ti-layout-grid2"></i> Subcity / ዳሽቦርድ </a></li>
                            <li class="label">Sector</li>
                            <li><a href="{{url('/dashboard')}}"><i class="ti-layout-list-thumb"></i> Sector / ዳሽቦርድ </a></li>
                            {{-- <li class="label">Wereda</li>
                            <li><a href="{{url('/dashboard')}}"><i class="ti-layout-menu-v"></i> Wereda / ዳሽቦርድ </a></li> --}}

                            {{-- <li class="label">Survey</li>
                            <li><a href="{{url('/survey')}}"><i class="ti-home"></i> Survey / ዳሽቦርድ </a></li> --}}
<hr/>
                            <li> <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="ti-close"></i> Logout / ውጣ
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form></li>
                 
                </ul>
            </div>
        </div>
    </div>