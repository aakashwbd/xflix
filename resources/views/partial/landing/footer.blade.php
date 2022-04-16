<div id="footer" class="footer text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <a href="">
                    <img class="img-fluid avatar-sm-1-circle"
                         src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                         alt="">
                </a>

                <span class="site-description d-block my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, in?</span>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <h6 class="footer_title text-capitalize fw-bold fs-5">site map</h6>

                <div class="row row-cols-2">
                    <div class="col">
                        <ul class="list">
                            <li class="list-item">
                                <a href="{{url('/')}}" class="list-link text-capitalize">Members</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/information?tab=legal')}}" class="list-link text-capitalize">Legal Notice</a>
                            </li>

                            <li class="list-item">
                                <a href="{{url('/videos')}}" class="list-link text-capitalize">Videos</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/live')}}" class="list-link text-capitalize">X-flix ?</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/live')}}" class="list-link text-capitalize">Live</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list">
                            <li class="list-item">
                                <a href="{{url('/inscription')}}" class="list-link text-capitalize">Inscription</a>
                            </li>
                            <li class="list-item">
                                <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal"  class="list-link text-capitalize">Connection</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/information?tab=faq')}}" class="list-link text-capitalize">Faq / Contact</a>
                            </li>
                            <li class="list-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal"
                                   class="list-link text-capitalize">Contact</a>
                            </li>
                            <li class="list-item">
                                <a href="" class="list-link text-capitalize">Refund Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <h6 class="footer_title text-capitalize fw-bold fs-5">Partner site</h6>
                <ul class="row list">
                    <li class="col-lg-6 list-item">
                        <a href="" class="list-link">lorem ipsum</a>
                    </li>
                    <li class="col-lg-6 list-item">
                        <a href="" class="list-link">lorem ipsum</a>
                    </li>
                    <li class="col-lg-6 list-item">
                        <a href="" class="list-link">lorem ipsum</a>
                    </li>
                    <li class="col-lg-6 list-item">
                        <a href="" class="list-link">lorem ipsum</a>
                    </li>
                </ul>
            </div>


            <div class="col-lg-3 col-sm-6 col-12">
                <h6 class="footer_title text-capitalize fw-bold fs-5">Share the Website on</h6>

                <div class="d-flex align-items-center">
                    <a href="" class="list-link">
                        <i class="bi bi-facebook social-icon"></i>
                    </a>

                    <a href="" class="list-link">
                        <i class="bi bi-twitter social-icon"></i>
                    </a>


                </div>


            </div>
        </div>
    </div>
</div>

{{--Confirmation Modal--}}
<div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">title</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="text-center">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nostrum.</span>
                        </div>

                        <form action="">
                            <select id="dobyear" class="my-3 form-select py-3 px-4 rounded-0 "></select>
                            <span id="confirmErrMsg"
                                  class="text-danger  d-none">Please Confirm Your Birth Year....</span>

                            <button id="birthConfirmDialogBtn"
                                    class="btn btn-primary form-control py-3 px-4 rounded-0 my-3 text-capitalize">
                                confirm
                            </button>

                            <div class="text-center">
                                <span class="text-center">or</span>
                            </div>


                            <button class="btn btn-dark form-control py-3 px-4 rounded-0 my-3 text-capitalize">
                                login
                            </button>

                            <a href="{{url('/auth/twitter')}}"
                               class="btn btn-tweeter form-control py-3 px-4 rounded-0 my-3 text-capitalize">
                                tweeter
                            </a>
                        </form>

                        <h6 class="text-capitalize fw-bold">terms & condition</h6>
                        <span class="fw-lighter">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid aperiam consectetur cum deserunt distinctio eaque id ipsum libero maiores minima, molestias natus </span>

                        <div class="border-top border-bottom py-2 my-3 text-center">
                            <p class="text-black-50">How to protect your child</p>
                            <ul class="d-flex justify-content-around align-items-center">
                                <li>
                                    <a href="">
                                        <img class="avatar"
                                             src="https://w7.pngwing.com/pngs/786/126/png-transparent-logo-contracting-photography-logo-symbol.png"
                                             alt="">
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img class="avatar"
                                             src="https://w7.pngwing.com/pngs/786/126/png-transparent-logo-contracting-photography-logo-symbol.png"
                                             alt="">
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img class="avatar"
                                             src="https://w7.pngwing.com/pngs/786/126/png-transparent-logo-contracting-photography-logo-symbol.png"
                                             alt="">
                                    </a>
                                </li>
                            </ul>


                        </div>
                        <span class="fw-lighter">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid aperiam consectetur cum deserunt distinctio eaque id ipsum libero maiores minima, molestias natus </span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">Contact</h6>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <span>You have a question, a problem, a suggestion ... contact us</span>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="email">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Object">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-3">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 offset-lg-3">
                            <button class="btn btn-primary form-control">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="locationModal" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">GEO Location</h6>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <span>To display the profiles around you, <br> indicate the city below:</span>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control  locationInput" placeholder="city">
                    <span class="locationError text-danger d-none">Please select your city</span>
                </div>
                <div class="text-center my-3">
                    <button id="location-btn" class="btn btn-primary w-75  form-control">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="messenger d-none">
    <div class="header">
        <img class="profile-image" src="" alt="">
        <span class="iconify" data-icon="ep:close-bold" data-width="20" data-height="20"></span>
    </div>

    <ul class="body" id="messages">
        <li class="to-user">hi</li>
        <li class="from-user">hlw</li>
    </ul>

    <form class="footer" id="messageForm">
        <input type="hidden" id="messenger-user-id" class="messenger-user-id">
        <input type="text" class="form-control" placeholder="write your message...." id="message_input">
        <button class="btn" type="submit">
            <span class="iconify text-primary" data-icon="bi:send-fill" data-width="20" data-height="20"></span>
        </button>
    </form>

</div>

@include('partial.landing.auth.login')
<script src="{{asset('asset/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{asset('asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('asset/vendor/Minimalist-jQuery-Plugin-For-Birthday-Selector-DOB-Picker/dobpicker.js')}}"></script>

<script src="{{asset('asset/vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('asset/vendor/ImagesLoader-main/jquery.imagesloader-1.0.1.js')}}"></script>

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

@stack('custom-js')

</body>
</html>
