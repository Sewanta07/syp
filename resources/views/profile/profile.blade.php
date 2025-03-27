@extends('layout.index')<!-- Overview Section -->
@section('content')
<h1 class="fade-in">PROFILE</h1>

    <div class="profile-container slide-in">
        <!-- User Details Section (Left) -->
        <div class="user-details-section">
            <h2>IMS USER INFORMATION</h2>
            <div class="user-details">
                <p><strong>Name:</strong> <span id="user-name"></span></p>
                <p><strong>Email:</strong> <span id="user-email"></span></p>
                <p><strong>Role:</strong> <span id="user-role"></span></p>
                <p><strong>Phone:</strong> 
                    <input type="text" id="user-phone" placeholder="Add Phone" class="editable">
                </p>
                <p><strong>Address:</strong> 
                    <input type="text" id="user-address" placeholder="Add Address" class="editable">
                </p>
                <button id="save-profile" class="btn">Save Changes</button>
            </div>
        </div>

        <!-- Profile Photo Section (Right) -->
        <div class="profile-photo-section">
            <label for="profile-pic-upload">
                <img id="user-photo" src="Images/default-user.png" alt="User Photo" class="profile-animate">
            </label>
            <input type="file" id="profile-pic-upload" accept="image/*" style="display: none;">
        </div>
    </div>
</div>
@endsection()