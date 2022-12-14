<nav class="sidebar sidebar-offcanvas mt-10" id="sidebar">
    <ul class="nav">
        <li class="text-center mb-5">
            <p class="mb-0 pb-0">Welcome</p>
            <h5>Hair Salon Shop</h5>
        </li>
        <?php $owner = App\Owner::where('id', Auth::guard('owner')->user()->id)->first();
        ?>
        @if (@$owner->has_subscription == 'Yes')
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/owner/my-profile') }}">
                    <img src="assets/images/icon1.png" alt="">
                    <span class="menu-title">My Profile</span>
                </a>
             
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/owner/staff-profile') }}">
                    <img src="assets/images/icon1.png" alt="">
                    <span class="menu-title">Staff Profile</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/owner/salon-gallery') }}">
                    <img src="assets/images/icon1.png" alt="">
                    <span class="menu-title">Salon Gallery</span>

                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/owner/chair-availability') }}">
                    <img src="assets/images/icon2.png" alt="">
                    <span class="menu-title">Chair/Room Availability</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('owner/booking-register')}}">
                    <img src="assets/images/icon3.png" alt="">
                    <span class="menu-title">Booking Register</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/owner/location') }}">
                    <img src="assets/images/icon4.png" alt="">
                    <span class="menu-title">Location</span>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/owner/support')}}">
                <img src="assets/images/icon5.png" alt="">
                <span class="menu-title">Support Centre</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="assets/images/icon6.png" alt="">
                    <span class="menu-title">Reviews</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="assets/images/icon7.png" alt="">
                    <span class="menu-title">Disputes</span>

                </a>
            </li>

        @endif

    </ul>
</nav>
