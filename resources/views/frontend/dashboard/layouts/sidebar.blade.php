@php
$currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{route($currentRoute)}}" class="dash_logo"><img src="{{asset($logoSetting->logo ?? '')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a class="{{setActive(['user.dashboard'])}}" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>

        <li><a class="" href="{{url('/')}}"><i class="fas fa-home"></i>Go To Home Page</a></li>

        @if (auth()->user()->role === 'vendor')
            <li><a class="{{setActive(['vendor.dashboard'])}}" href="{{route('vendor.dashboard')}}"><i class="fas fa-tachometer"></i>Go to Vendor Dashboard</a></li>
        @endif


        <li><a href="#"><i class="fas fa-list-ul"></i> Orders</a></li>
        <li><a href="#"><i class="far fa-star"></i> Reviews</a></li>

        <li><a href="{{route('user.profile.edit')}}"><i class="far fa-user"></i> My Profile</a></li>
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
