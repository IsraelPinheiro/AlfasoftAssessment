<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="MainSidebar">
    {{-- Sidebar - Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-archive"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Contacts</div>
    </a>

    {{-- Divider --}}
    <hr class="sidebar-divider">

    {{-- Nav Item - Home --}}
    <li class="nav-item">
        <a class="nav-link pt-0" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>{{__("Home")}}</span>
        </a>
    </li>
    @if(Auth::check())
        @if(Auth::user()->profile->users_read || Auth::user()->profile->profiles_read)
            {{-- Divider --}}
            <hr class="sidebar-divider">
            {{-- Heading - Management --}}
            <div class="sidebar-heading pb-2">
                {{__("Management")}}
            </div>
        @endif
        {{-- Nav Item - Users --}}
        @if(Auth::user()->profile->users_read)
            <li class="nav-item">
                <a class="nav-link pt-0" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{__("Users")}}</span>
                </a>
            </li>
        @endif
        {{-- Nav Item - Profiles --}}
        @if(Auth::user()->profile->profiles_read)
        <li class="nav-item">
            <a class="nav-link pt-0" href="{{ route('profiles.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{__("Profiles")}}</span>
            </a>
        </li>
        @endif
    @endif

    {{-- Divider --}}
    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler (Sidebar) --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>