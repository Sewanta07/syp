  
  @extends('layout.index')<!-- Overview Section -->
  @section('content')
  <h1>Dashboard</h1>
  <div class="overview">
            <div class="overview-card">
                <h3>Total Items</h3>
                <p id="total-items">{{$inventory}}</p>
            </div>
            <div class="overview-card">
                <h3>Low Stock</h3>
                <p id="low-stock">20</p>
            </div>
            <div class="overview-card">
                <h3>Out of Stock</h3>
                <p id="out-of-stock">30</p>
            </div>
            <div class="overview-card">
                <h3>Users</h3>
                <p id="recent-sales">{{$user}}</p>
            </div>
        </div>
    
        <!-- Download Button -->
        <!-- <button id="download-data" class="btn">Download Dashboard Data</button> -->
    
        <!-- Stock Graphs -->
        <div class="charts-container">
        <image src="https://img.freepik.com/free-vector/store-staff-check-number-products-that-must-be-delivered-customers-day_1150-51079.jpg"/>
        </div>
        @endsection()