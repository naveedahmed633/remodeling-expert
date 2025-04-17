<!-- Main Sidebar Container -->
<style>
    .active {
        background-color: #007BFF !important;
        color: white !important;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ $setting->site_title ?? '' }}</span>
        <img src="{{ isset($setting) ? $setting->cmsImages('footer_logo') : asset('front/images/No-Image.png')}}"
            width="50">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{ route('admin.service.index') }}" class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Services</p>
                            </a>
                        </li>     
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Blogs</p>
                            </a>
                        </li>                    

                        <!--  CMS-Section -->
                        {{-- <div style="border-top: 1px solid #ddd; padding-top: 10px;">
                            <h4 class="text-white p-4">CMS</h4>
                            <li class="nav-item {{ request()->is('admin/cms*') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-home nav-icon"></i>
                                    <p>
                                        CMS Section
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'home']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/home/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Home</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'contact']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/contact/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Contact</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'about']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/about/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>About</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'program']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/program/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Program</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'league']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/merchandise/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Leagues & Tournaments</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'personal_training']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/podcast/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Personal Training</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'events']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/donation/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Events</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'get_in_touch']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/donation/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Get In Touch</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'privacy_policy']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/privacy/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Privacy Policy</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'term_condition']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/term/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Term And Condition</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div> --}}
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>