<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">
    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}" data-widget="treeview" role="menu" @if(config('adminlte.sidebar_nav_animation_speed') != 300) data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}" @endif @if(!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                {{-- Configured sidebar links --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Daftar Tamu<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(auth::user()->role != 'anggota' && auth::user()->role != 'staff')
                            <li class="nav-item">
                                <a href="{{ url('/tamu') }}" class="nav-link">
                                    <i class="fas fa-user"></i>
                                    <p>Tamu</p>
                                </a>
                            </li>
                        @endif
                        @if(auth::user()->role != 'anggota' && auth::user()->role != 'staff')
                            <li class="nav-item">
                                <a href="{{ url('/jabatan') }}" class="nav-link">
                                    <i class="fas fa-briefcase"></i>
                                    <p>Jabatan</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('/buku_tamu') }}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>Buku Tamu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End of manual sidebar -->
            </ul>
        </nav>
    </div>
</aside>
