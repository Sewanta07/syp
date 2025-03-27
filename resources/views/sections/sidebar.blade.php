<div class="sidebar">
        <div class="logo-container">
            <a href="main.html">
                <img src="logo/Logo.png" alt="Global Store Logo" class="logo">
            </a>
            <h2>Inventory Management System</h2>
        </div>
        <h2>MENU</h2>
        <ul>
        <li class="{{ ($active_menu ?? '') == 'dashboard' ? 'active' : '' }}"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li class="{{ ($active_menu ?? '') == 'inventory' ? 'active' : '' }}" ><a href="{{route('dashboard.inventory')}}">Inventory</a></li>
            <li class="active"><a href="{{route('dashboard.product')}}">Products</a></li>
            <li><a href="{{route('dashboard.inventory')}}">About Me</a></li>
            <li><a href="#" onclick="logout()">Logout</a></li>
        </ul>
    </div>