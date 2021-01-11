<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"><img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a></div>
          </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-home "></i>
                        <p>Имоти</p>
                        <span class="badge badge-success right">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-users "></i>
                        <p>Агенти</p>
                        <span class="badge badge-success right">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-user "></i>
                        <p>Профил</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-tools "></i>
                        <p>Настройки</p>
                    </a>
                </li>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>
