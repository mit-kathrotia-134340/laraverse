<x-base>
    <div class="container-fluid">
        <div class="row login justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="lara-logo">
                    <img src="images/login-logo.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="col-12 text-center mb-3">
                    <p class="h3">Register to Laraverse</p>
                </div>
                <form action="/users/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="floatingInput" placeholder="user_name"
                            name="username" value="{{old('username')}}">
                        <label for="floatingInput">Username</label>
                        @error('username')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Display Name"
                            name="name" value="{{old('name')}}">
                        <label for="floatingInput">Display Name</label>
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            name="email" value="{{old('email')}}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select Icon</label>
                        <input class="form-control" type="file" id="formFile" name="avatar" value="{{old('avatar')}}">
                        @error('avatar')
                        {{$message}}
                    @enderror
                      </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control" id="floatingCPassword" placeholder="Password"
                            name="password_confirmation">
                        <label for="floatingPassword">Confirm Password</label>
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <input type="submit" value="Log In" class="form-control login-btn">
                </form>
                <div class="tag text-center mt-3">
                    <p>already user? <a href="/login" class="text-cdark"> log in here </a></p>
                </div>
            </div>
        </div>
    </div>
</x-base>
