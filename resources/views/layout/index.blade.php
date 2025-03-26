
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inventory.css') }}">

    <script defer src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for graphs -->
</head>
<body>
   @include('sections.sidebar')
    <div class="main-content">
        <!-- <h1>DASHBOARD</h1> -->
    @yield('content');
    </div>
    
</body>

<script src="{{ asset('js/product.js') }}"></script>
<script src="{{ asset('js/inventory.js') }}"></script>
</html>
