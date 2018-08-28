<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="nav-item start {{ Request::is('admin') ? 'active' : '' }} ">
                <a href="/admin" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{strpos(url()->current(), 'admin/profile') ? 'active' : ''}} ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Profile</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::is('admin/profile') ? 'active open' : '' }} ">
                        <a href="/admin/profile" class="nav-link ">
                            <i class="fa fa-list-alt"></i>
                            <span class="title">Overview</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/profile/settings') ? 'active open' : '' }} ">
                        <a href="/admin/profile/settings" class="nav-link ">
                            <i class="icon-settings"></i>
                            <span class="title">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/admin/profile/help" class="nav-link ">
                            <i class="icon-info"></i>
                            <span class="title">Help</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
   </div>