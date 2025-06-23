<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('vendor/layout-package/img/admin-panel.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/layout-package/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="pace-done">
    <div id="page-wrapper" class="gray-bg" style="width: 100%; padding: 0">
        @include('layout-package::layouts.partials.sidebar')
        <div class="content" id="content">
            <div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/layout-package/js/sidebar-toggle-init.js') }}"></script>
</body>
</html>