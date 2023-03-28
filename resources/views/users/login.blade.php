<x-base>
    <div class="container-fluid login">
        <div class="row  justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="lara-logo">
                    <img src="images/login-logo.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-1">
            <div class="col-6">
                <div class="col-12 text-center mb-5">
                    <p class="h3">Login to Laraverse</p>
                </div>
                <form action="/users/authenticate" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <input type="submit" value="log in" class="form-control login-btn">
                </form>
                <div class="tag text-center mt-3">
                    <p>New user? <a href="/register" class="text-cdark"> Register here </a></p>
                </div>
            </div>
        </div>
    </div>

</x-base>
