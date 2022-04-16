<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">

                <div class="login-content">
                    <h4 class="text-capitalize text-center">login</h4>
                    <hr>
                    <div class="d-flex align-items-center justify-content-center">
                        <span>Not a member yet? </span>
                        <a class="btn text-primary text-decoration-underline" href="{{url('/inscription')}}">Sign Up</a>
                    </div>

                    <form action="{{url('/api/auth/login')}}" id="loginForm">

                        <div class="form-group mb-3">
                            <label for="email" id="email_label" class="form-label email_label phone_label">Email</label>
                            <input class="form-control email phone" type="text" id="emailorphone" name="emailorphone" placeholder="Email or Phone">
                            <span class="text-danger email_error phone_error" id="email_error"></span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" id="password_label" class="form-label password_label">Password</label>
                            <input class="form-control password" type="password" id="password" name="password" placeholder="*******">
                            <span class="text-danger password_error" id="password_error"></span>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary form-control">Login</button>
                        </div>



                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-lg-6 offset-lg-3">--}}
                        {{--                                --}}
                        {{--                                <a href="" class="btn border form-control mb-3">tweeter</a>--}}

                        {{--                                <a href="" class="btn text-decoration-underline form-control" data-bs-toggle="modal"--}}
                        {{--                                   data-bs-target="#forgotModal">forgot password</a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('custom-js')
    <script>
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form);
        })

    </script>
@endpush
