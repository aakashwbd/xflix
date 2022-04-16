@include('partial.admin.header')
<div class="container-fluid py-5">
    <div class="row py-5">
        <div class="col-lg-4 col-sm-12 offset-lg-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mb-3">
                        <h4>Login</h4>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                    </div>
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label email_label" id="email_label">Email</label>
                            <input type="email" class="form-control py-2 rounded-0" id="email"
                                   placeholder="example@example.com">
                            <span class="text-danger email_error" id="email_error">err mgs</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label password_label" id="password_label">Password</label>
                            <input type="password" class="form-control py-2 rounded-0" id="password"
                                   placeholder="******">
                            <span class="text-danger password_error" id="password_error">err mgs</span>
                        </div>

                        <div class="text-end mb-3">
                            <span>
                                <a href="" class="text-black-50 text-decoration-underline">forget password</a>
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary text-capitalize mb-3 form-control rounded-0 py-2">
                            login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partial.admin.footer')

