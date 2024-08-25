<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link border-bottom text-center">
        {{-- <img src="{{ asset('assets/favicon/favicon.ico') }}" alt="Logo" class="brand-image img-circle elevation-3 bg-white"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-bold text-white">MOOC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.user.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.category.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.question.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.question.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Question
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.level.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.level.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-ol"></i>
                            <p>
                                Level
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.instrument.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.instrument.index') || Request::routeIs('admin.instrument.create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>
                                Instrument
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.history.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.history.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                History
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                        @csrf
                    </form>
                    <a href="#" class="nav-link text-white @yield('')"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
