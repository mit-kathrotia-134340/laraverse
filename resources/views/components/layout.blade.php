<div class="container-fluid">
    <div class="row header">
        <div class="col-12 col-lg-2 aside text-center">
            <a href="#" class="logo d-flex justify-content-center">
                <img src="images/logo-color.png" alt="" class="img-fluid">
            </a>
            <ul class="list-unstyled">
                @auth
                    <li>
                        <a href="{{route('home')}}" class="text-decoration-none">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{route('explore')}}" class="text-decoration-none">
                            <i class="fa fa-hashtag" aria-hidden="true"></i>

                            Explore
                        </a>
                    </li>
                    <li>
                        <a href="{{route('notifications')}}" class="text-decoration-none">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            Notification
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            Profile
                        </a>
                    </li>
                @endauth
            </ul>
            @auth
                <ul class=" list-unstyled ">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="a-btn text-decoration-none" value="Log Out" name="logout"/>
                        </form>
                    </li>
                </ul>
            @else
                <ul class=" list-unstyled ">
                    <li>

                        <a href="/login" class="a-btn text-decoration-none">Log In</a>
                    </li>
                    <li>

                        <a href="/register" class="a-btn text-decoration-none   ">Sign Up</a>
                    </li>

                </ul>

            @endauth
        </div>
        <div class="col-12 col-lg-10 section">
            <div class="row main justify-content-evenly align-items-center ">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
