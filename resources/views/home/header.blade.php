<style>
    input[type='submit'].nav-link{
        padding: 5px 25px;
        color: #514f4f;
        text-align: center;
        text-transform: uppercase;
        border-radius: 5px;
        border: none;
    }

    .nav-link:hover{
        background-color: white !important;
    }

    .nav-link:focus{
        background-color: #db4566 !important;
    }
</style>

<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{url('/')}}">
          <span>
            Gifts
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('shop')}}">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('why')}}">
                        Why Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('testimonial')}}">
                        Testimonial
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
                </li>
            </ul>
            <div class="user_option">

                @if (Route::has('login'))

                    @auth
                        <a href="{{url('user_order')}}" class="nav-link" style="color: #514f4f;
                        text-transform: uppercase;">My Orders</a>

                        <a href="{{url('shopping_cart')}}">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <sup style="font-size: medium; font-weight: bold; color: #db4566">{{$count}}</sup>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" style="padding: 15px">
                            @csrf
                            <input type="submit" value="Logout" class="nav-link">
                        </form>
                    @else
                        <a href="{{url('/login')}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                             Login
                        </span>
                        </a>

                        <a href="{{url('/register')}}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>
                                Register
                            </span>
                        </a>
                    @endauth
                    @endif

{{--                <form class="form-inline ">--}}
{{--                    <button class="btn nav_search-btn" type="submit">--}}
{{--                        <i class="fa fa-search" aria-hidden="true"></i>--}}
{{--                    </button>--}}
{{--                </form>--}}
            </div>
        </div>
    </nav>
</header>
