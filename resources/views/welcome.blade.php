<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Laravel Vue 3</title>

    @vite(['resources/css/app.css'])

    @vite(['resources/js/app.css.js', 'resources/js/app.js'])



    <!-- Extra vite/JS Scripts -->
    @stack('script')

    <!-- Extra CSS Files -->
    @stack('style')

    <!-- General CSS Files -->

    <input type="hidden" id="base_url" value="{{ url('/') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app" style="display: none;">

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('partials.nav')
            @include('partials.sidebar')



            <!-- Main Content -->
            @yield('content')

            @include('partials.footer')
        </div>
    </div>

    <script>
        var base_url = "{{ url('/') }}"+'/';
        var lang = "{{ app()->getLocale() }}"
    </script>




    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ url('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('assets/js/page/components-table.js') }}"></script>
    <script src="{{ url('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ url('assets/js/page/features-posts.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>




    <script>
        $(document).ready(function() {
            $("#app").show();
        })
    </script>

</body>

</html>
