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
                        <li class="nav-item">
                            <a href="{{ route('admin.project.index') }}" class="nav-link {{ request()->is('admin/project*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.form.services.index') }}" class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Service Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.subservice.category.index') }}" class="nav-link {{ request()->is('admin/subservice-category*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Subservice Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.remodel.type.index') }}" class="nav-link {{ request()->is('admin/remodel-type*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Remodel Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.requirement.index') }}" class="nav-link {{ request()->is('admin/requirement*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Requirement</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.order.index') }}" class="nav-link {{ request()->is('admin/order*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Order Listing</p>
                            </a>
                        </li>

                        <!--  CMS-Section -->
                        <div style="border-top: 1px solid #ddd; padding-top: 10px; padding-bottom: 50px;">
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
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'project']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/project/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Project</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'service']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/service/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Service</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'blog']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/blog/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Blog</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('admin.pages.edit', ['slug' => 'stepform']) }}"
                                            class="nav-link {{ request()->is('admin/cms/pages/step-form/edit') ? 'active' : '' }}">
                                            <i class="fas fa-eject nav-icon"></i>
                                            <p>Step Form</p>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
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
                                    </li> --}}
                                </ul>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
