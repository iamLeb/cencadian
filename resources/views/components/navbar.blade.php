<?php
   $links = [
       [
           "name" => "Dashboard",
           "path" => "home",
           "icon" => "mdi-speedometer"
       ],
       [
           "name" => "My Account",
           "path" => "profile",
           "icon" => "mdi-account-circle-outline"
       ]
   ];

   $hiredLInks = [
       [
           "name" => "Dashboard",
           "path" => "home",
           "icon" => "mdi-speedometer"
       ],
       [
           "name" => "My Info",
           "path" => "profile",
           "icon" => "mdi mdi-account-circle"
       ],
       [
           "name" => "My Documents",
           "path" => "my.documents",
           "icon" => "mdi-clipboard-file"
       ],
       [

           "name" => "Clock in / Clock Out",
           "path" => "clock.index",
           "icon" => "mdi-progress-clock"
       ],
       [
            "name" => "My Pay",
            "path" => "show.my.pay",
            "icon" => "mdi-account-cash"
        ],
   ];
?>

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark" style="width:100%">
                    <span class="logo-sm">
                        <img src="{{ asset('front/assets/img/favicon.png') }}" alt="" height="22">
                    </span>
            <span class="logo-lg" style="width:100%">
                        <img src="{{ asset('front/assets/img/cencadianLandscape.png') }}" alt="" height="17">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light" style="width:100%">
                    <span class="logo-sm">
                        <img src="{{ asset('front/assets/img/favicon.png') }}" alt="" height="22">
                    </span>
            <span class="logo-lg" style="width:100%">
                        <img src="{{ asset('front/assets/img/cencadianLandscape.png') }}" alt="" height="100%" width="100%">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @php $user = auth()->user(); @endphp

                @if (!$user)

                @elseif($user->isIntern())
                    @foreach($links as $link)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route($link['path']) }}">
                                <i class="mdi {{ $link['icon'] }}"></i>
                                <span data-key="t-widgets">{{ $link['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @elseif($user->isAdmin())
                    @foreach($links as $link)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route($link['path']) }}">
                                <i class="mdi {{ $link['icon'] }}"></i>
                                <span data-key="t-widgets">{{ $link['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin.createAdmin')}}">
                            <i class="mdi mdi mdi-account-key"></i>
                            <span data-key="t-widgets">My Admins</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin.hired.interns', $user->id)}}">
                            <i class="mdi mdi mdi-account-circle"></i>
                            <span data-key="t-widgets">Hired Interns</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-account"></i> <span data-key="t-apps">My Interns</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarApps" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> View Interns </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarApps2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps2">
                            <i class="mdi mdi-google-circles-extended"></i> <span data-key="t-apps">My Companies</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarApps2" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.companies') }}" class="nav-link" data-key="t-calendar"> View Companies </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarApps3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps3">
                            <i class="mdi mdi-file-document"></i> <span data-key="t-apps">Documents</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarApps3" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('my.documents') }}" class="nav-link" data-key="t-calendar"> My Documents </a>
                                </li>
                            </ul>
                        </div>

                        <div class="menu-dropdown collapse" id="sidebarApps3" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('show.add.employee.documents') }}" class="nav-link" data-key="t-calendar"> Add Employee Documents </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                @elseif ($user->isCompany())
                    @foreach($links as $link)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route($link['path']) }}">
                                <i class="mdi {{ $link['icon'] }}"></i>
                                <span data-key="t-widgets">{{ $link['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @elseif ($user->isHired())
                    @foreach($hiredLInks as $link)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route($link['path']) }}">
                                <i class="mdi {{ $link['icon'] }}"></i>
                                <span data-key="t-widgets">{{ $link['name'] }}</span>
                            </a>
                        </li>
                    @endforeach

                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="mdi mdi-clipboard-file"></i> <span data-key="t-apps">Documents</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarApps" style="">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="http://127.0.0.1:8000/admin/interns" class="nav-link" data-key="t-calendar"> Onboarding Docs. </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://127.0.0.1:8000/admin/interns" class="nav-link" data-key="t-calendar"> Training Docs. </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://127.0.0.1:8000/admin/interns" class="nav-link" data-key="t-calendar"> Personal Docs. </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://127.0.0.1:8000/admin/interns" class="nav-link" data-key="t-calendar"> Tax Docs. </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>

