<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{route('vendor.dashboard')}}" class="dash_logo"><img src="{{asset($logoSetting->logo ?? '')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a class="{{setActive(['vendor.dashboard'])}}" href="{{route('vendor.dashboard')}}"><i class="fas fa-tachometer"></i>Vendor Dashboard</a></li>

        <li><a class="" href="{{route('home')}}"><i class="fas fa-home"></i>Go To Home Page</a></li>
        <li>
            <a class="{{setActive(['vendor.products.*'])}}" href="{{route('vendor.products.index')}}">
                <i class="fas fa-cart-plus"></i> Products
            </a>
        </li>
        <li><a href="#"><i class="fas fa-list-ul"></i> Orders</a></li>
        <li><a href="#"><i class="far fa-star"></i> Reviews</a></li>
        <li>
            <a class="{{setActive(['vendor.shop-profile.edit'])}}" href="{{route('vendor.shop-profile.edit')}}">
                <i class="far fa-user"></i> Shop Profile
            </a>
        </li>
        <li><a href="{{route('vendor.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
        <li><a href="#" ><i class="fal fa-gift-card"></i> Addresses</a></li>
        @if (auth()->user()->role !== 'vendor')
            <li><a href="#"><i class="far fa-user"></i> Request to be vendor</a></li>
        @endif
        <li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
            </form>
        </li>

    </ul>
</div>
