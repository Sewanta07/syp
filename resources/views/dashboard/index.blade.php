  
  @extends('layout.index')<!-- Overview Section -->
  @section('content')
  <h1>Dashboard</h1>
  <div class="overview">
            <div class="overview-card">
                <h3>Total Items</h3>
                <p id="total-items">Loading...</p>
            </div>
            <div class="overview-card">
                <h3>Low Stock</h3>
                <p id="low-stock">Loading...</p>
            </div>
            <div class="overview-card">
                <h3>Out of Stock</h3>
                <p id="out-of-stock">Loading...</p>
            </div>
            <div class="overview-card">
                <h3>Recent Sales</h3>
                <p id="recent-sales">Loading...</p>
            </div>
        </div>
    
        <!-- Download Button -->
        <button id="download-data" class="btn">Download Dashboard Data</button>
    
        <!-- Stock Graphs -->
        <div class="charts-container">
            <div class="chart-box">
                <canvas id="stock-chart"></canvas>
            </div>
            <div class="chart-box">
                <canvas id="category-chart"></canvas>
            </div>
        </div>
        @endsection()