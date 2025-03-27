@extends('layout.index')<!-- Overview Section -->
@section('content')
        <h1>Add PRODUCTS</h1>
        <div class="row">
                <div class="small-form">
                    <h2>Add New Item</h2>
                    <form id="inventory-formx" action="{{ route('inventory.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf  {{-- Laravel CSRF Protection --}}
@include('product.product-form')
                        <!-- Submit Button -->
                        <button type="submit" class="btn">Add Item</button>
                    </form>

                </div>
            </div>
        </div>

    @endsection()