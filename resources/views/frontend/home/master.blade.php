@include('frontend.layouts.style')
<body>
    @include('frontend.layouts.preloader')

    <!-- Humberger Begin -->
    @include('frontend.layouts.others')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('frontend.layouts.header')
    <!-- Header Section End -->
    {{-- main section --}}
    @yield('content')
    {{-- main section --}}

    <!-- Footer Section Begin -->
    @include('frontend.layouts.footer')
    <!-- Footer Section End -->
    @include('frontend.layouts.script')
    
  
