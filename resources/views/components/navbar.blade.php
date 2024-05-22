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
                            <i class="mdi "></i>
                            <span data-key="t-widgets">My Admins</span>
                        </a>
                    </li>

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

                        <hr>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link menu-link collapsed" href="#employeeTemplates" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">--}}
{{--                                <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Employee Templates</span>--}}
{{--                            </a>--}}
{{--                            <div class="menu-dropdown collapse" id="employeeTemplates" style="">--}}
{{--                                <ul class="nav nav-sm flex-column">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.template.interview') }}" class="nav-link" data-key="t-calendar"> Letter of Interview </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Interview Questions </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Offer Letter </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Paystub Template </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link menu-link collapsed" href="#projectTemplates" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">--}}
{{--                                <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Project Templates</span>--}}
{{--                            </a>--}}
{{--                            <div class="menu-dropdown collapse" id="projectTemplates" style="">--}}
{{--                                <ul class="nav nav-sm flex-column">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Project Completion and Sign </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Project Contracts </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Project Proposal </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="nav-item">--}}
{{--                                        <a href="{{ route('admin.interns') }}" class="nav-link" data-key="t-calendar"> Non Disclosure Agreement </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
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

