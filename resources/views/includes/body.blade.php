<body id="page-top">
    {{-- Page Wrapper --}}
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('includes.sidebar')
        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">
            {{-- Main Content --}}
            <div id="content">
                {{-- Topbar --}}
                @include('includes.topbar')
                {{-- Begin Page Content --}}
                <div class="container-fluid">
                    {{-- Page Heading --}}
                    <h1 class="h3 mb-4 text-gray-800">@yield('heading')</h1>
                    @yield('content')
                </div>
            </div>
            {{-- Footer --}}
            @include('includes.footer')
        </div>
    </div>
    {{-- Scroll to Top Button--}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>