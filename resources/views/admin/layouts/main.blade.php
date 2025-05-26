<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.start')
</head>
<body class="bg-gray-50">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="pl-64 pt-[70px]">
        <div class="p-6">
            @yield('container')
        </div>
    </div>

    @include('admin.partials.end')
    @include('sweetalert::alert')
    @yield('scripts')
</body>
</html>

