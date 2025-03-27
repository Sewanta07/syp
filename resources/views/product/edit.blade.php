@extends('layout.index')<!-- Overview Section -->
@section('content')
        <h1>Edit PRODUCTS</h1>
        <div class="row">
                <div class="small-form">
                    <h2>Update Item</h2>
                    <form id="inventory-formx" action="{{ route('dashboard.update-inventory',$inventory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf  {{-- Laravel CSRF Protection --}}
                        @include('product.product-form')
                        <!-- Submit Button -->
                        <button type="submit" class="btn">Update</button>
                    </form>

                </div>
            </div>
        </div>

    @endsection()