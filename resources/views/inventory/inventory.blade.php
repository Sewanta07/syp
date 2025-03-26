@extends('layout.index')<!-- Overview Section -->
@section('content')
        <h1>INVENTORY</h1>

        <div class="inventory-container">
            <div class="inventory-section">
                <h2>Inventory Items</h2>
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
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="50">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <button class="delete-btn" data-id="{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div id="pagination-links">
                    {{ $inventory->links() }}
                </div>
            </div>


            <div class="item-management">
                <div class="small-form">
                    <h2>Add New Item</h2>
                    <form id="inventory-formx" action="{{ route('inventory.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf  {{-- Laravel CSRF Protection --}}

                        <!-- Item Name -->
                        <input type="text" name="item_name" id="item-name" placeholder="Item Name" value="{{ old('item_name') }}" required>
                        @error('item_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Quantity -->
                        <input type="number" name="item_quantity" id="item-quantity" placeholder="Quantity" value="{{ old('item_quantity') }}" required>
                        @error('item_quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Category -->
                        <input type="text" name="item_category" id="item-category" placeholder="Category" value="{{ old('item_category') }}" required>
                        @error('item_category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Stock Entry Date -->
                        <input type="date" name="stock_entry_date" id="stock-entry-date" value="{{ old('stock_entry_date') }}" required>
                        @error('stock_entry_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Price -->
                        <input type="number" name="item_price" id="item-price" placeholder="Price" value="{{ old('item_price') }}" required>
                        @error('item_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Upload Image -->
                        <label for="item-image">Upload Image:</label>
                        <input type="file" name="item_image" id="item-image" accept="image/*" required>
                        @error('item_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Image Preview -->
                        <img id="preview-image" src="" alt="Image Preview" style="display: none; width: 100px; height: 100px;">

                        <!-- Submit Button -->
                        <button type="submit" class="btn">Add Item</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection()