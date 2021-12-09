<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">



        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{ Auth::user()->avatar }}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="sidebar-designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
            <p class="sidebar-menu-title">Dash menu</p>
        </li>


        {{-- menu for admin --}}
        @if ($user->hasRole('Admin'))

        <li class="nav-item @yield('dashboard-active')">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item @yield('article-active')">
            <a class="nav-link" href="{{ route('admin.article.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Artikel</span>
            </a>
        </li>

        @endif

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>