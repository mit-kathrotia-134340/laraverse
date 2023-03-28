<div class="profile col-6 col-lg-3">

    <div class="row align-items-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="profile-bg d-flex justify-content-center">

                <img src="{{ auth()->user()->avatar ? asset('/storage/' . auth()->user()->avatar) : asset('/images/profile.png') }}"
                    alt="" class="profile-pic rounded-circle">
            </div>
        </div>
        <div class="col-12 profile-text d-flex justify-content-center">
            <div class="col-4">
                Username :
            </div>
            <div class="col-6">
                <strong>{{ auth()->user()->username }}</strong>
            </div>
        </div>
        <div class="col-12 profile-text d-flex justify-content-center">
            <div class="col-4">
                Name :
            </div>
            <div class="col-6">
                <strong>{{ auth()->user()->name }}</strong>
            </div>
        </div>
        <div class="col-12 profile-text d-flex justify-content-center">
            <div class="col-4">
                Email :
            </div>
            <div class="col-6">
                <strong>{{ auth()->user()->email }}</strong>
            </div>
        </div>
        <div class="col-12 profile-text d-flex justify-content-center">
            <div class="col-4">
                Followers
            </div>
            <div class="col-6">
                <a href="{{ route('followers') }}" class="text-cdark text-decoration-none">
                    <strong>{{ auth()->user()->getFollowers(auth()->user()) }}</strong>
                </a>

            </div>
        </div>
        <div class="col-12 profile-text d-flex justify-content-center">
            <div class="col-4">

                Following
            </div>
            <div class="col-6">
                <a href="{{ route('followings') }}" class="text-cdark text-decoration-none">
                    <strong>{{ auth()->user()->getFollowings(auth()->user()) }}</strong>
                </a>
            </div>
        </div>
        <div class="col-12 profile-text d-flex justify-content-center">

            <div class="col-10">

                <strong> {{ auth()->user()->bio }} </strong>
            </div>
        </div>
    </div>
</div>
