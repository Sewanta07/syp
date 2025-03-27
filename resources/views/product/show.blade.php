@extends('layout.index')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Product Details</h1>

    <table class="table table-bordered w-50 mx-auto">
        <tr>
            <th>Item Name</th>
            <td>{{ $inventory->name }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $inventory->category }}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{ $inventory->quantity }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>NPR {{ number_format($inventory->price, 2) }}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                @if ($inventory->image)
                    <img src="{{ asset('storage/' . $inventory->image) }}" width="400" class="img-thumbnail">
                @else
                    No Image Available
                @endif
            </td>
        </tr>
    </table>

    <div class="text-center">
        <a href="{{ route('dashboard.inventory') }}" class="btn btn-secondary">Back to Inventory</a>
    </div>
</div>
@endsection
