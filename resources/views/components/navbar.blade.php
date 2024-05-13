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
       ],
   ];
?>

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
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
                @if($user->isIntern())
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
                        <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">My Interns</span>
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
                            <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">My Companies</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarApps2" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.companies') }}" class="nav-link" data-key="t-calendar"> View Companies </a>
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
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>

