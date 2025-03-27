@extends('layout.index')<!-- Overview Section -->
@section('content')
        <h1>INVENTORIES</h1>

        <div class="inventory-container">
            <div class="inventory-section">
                <!-- <h2>Inventory Items</h2> -->
                <div class="search-box">
                    <input type="text" id="search-bar" placeholder="Search items...">
                    <button onclick="searchInventory()" class="search-btn">Search</button>
                </div>

            <div class="inventory-list-container">
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="inventory-list">
                        @foreach ($inventory as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock_entry_date }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="50">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="delete-btn" data-id="{{ $item->id }}">Delete</button>
                                    <a href="{{route('dashboard.edit-inventory',$item->id)}}" class="btn btn-secondary">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <div>
                <!-- Pagination Links -->
                <div id="pagination-links">
                    {{ $inventory->links() }}
                </div>
            </div>


          
        </div>
    @endsection()