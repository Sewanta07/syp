@extends('layout.index')

@section('content')
<h1 class="fade-in">PROFILE</h1>

<div class= "slide-in">
<!-- <h2>IMS USER INFORMATION</h2> -->
    <!-- User Details Section (Left) -->
    <!-- <div class="user-details-sectionx"> -->
        
        <form action="{{ route('user.update', $user->id) }}" class="profile-container" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- @method('PUT') -->

            <div class="user-details">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> Admin </p>

                <p><strong>Phone:</strong> 
                    <input type="text" name="phone" id="user-phone" value="{{ old('phone', $user->phone) }}" placeholder="Add Phone" class="form-control">
                </p>

                <p><strong>Address:</strong> 
                    <input type="text" name="address" id="user-address" value="{{ old('address', $user->address) }}" placeholder="Add Address" class="form-control">
                </p>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            <div class="profile-photo-section">
        <label for="profile-pic-upload">
            <img id="user-photo" src="{{ $user->image ? asset('storage/' . $user->image) : asset('Images/default-user.png') }}" 
                 alt="User Photo" class="profile-animate">
        </label>
        @if(!$user->image)
        <input type="file" name="profile_photo" id="profile-pic-upload" accept="image/*" class="d-none">
        @endif     
        </form>
   
    </div>

    <!-- Profile Photo Section (Right) -->

</div>
@endsection
