<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profile')</title>
    <!-- Add your CSS links here -->
</head>
<body>
    @if(isset($isRejected) && $isRejected)
        <div class="alert alert-danger">
            This application was rejected. Please <a href="{{ route('visa.reapply', $visaApplication->id) }}">reapply</a>.
        </div>
    @endif
    @yield('content')
</body>
</html> 