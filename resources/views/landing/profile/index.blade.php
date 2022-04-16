<?php
    $currentControllerName = Request::segment(1);
    $currentFullRouteName = Route::getFacadeRoot()
        ->current()
        ->uri();


    //    echo phpinfo();
?>


@extends('layouts.landing.index')
@section('content')
    <div id="profile" class="profile">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center border-0 bg-primary" id="profileNav" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "information") ? "active" : ''}}"
                            id="info-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "photos") ? "active" : ''}}" id="photos-tab"
                            data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Photos/videos
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Setting
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="favorite-tab" data-bs-toggle="tab" data-bs-target="#favorite"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Favorite
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="blacklist-tab" data-bs-toggle="tab" data-bs-target="#blocklist"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Blacklist
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premiumList"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Premium Access
                    </button>
                </li>
            </ul>
            <div class="tab-content bg-white" id="profileNavContent">
                <div class="tab-pane fade show {{ ((request()->get('tab')) == "information") ? "active" : ''}}"
                     id="information" role="tabpanel">
                    <form action="{{url('/api/auth/profile')}}" id="informationForm" class="text-white p-4">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label username_label" id="username_label"
                                           for="username">Username</label>
                                    <input class="form-control username" type="text" id="username" name="username"
                                           placeholder="Username">
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div id="userPhone" class="d-none">
                                    <div class="form-group">
                                        <label class="form-label" id="phone_label" for="phone">Mobile</label>
                                        <input class="form-control" type="text" id="phone" name="phone" placeholder="">
                                    </div>
                                </div>

                                <div id="userEmail" class="d-none">
                                    <div class="form-group">
                                        <label class="form-label " id="email_label" for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="birth_label" for="infoBirthYear">Birth Year</label>
                                    <select id="infoBirthYear" name="dob" class="form-select"></select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="city_label" for="address">City</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                           placeholder="City">
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="hiv_label" for="hiv">HIV Status</label>
                                    <select class="form-select" id="hiv" name="test">
                                        <option>1</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="preference_label" for="preference">Preference</label>
                                    <select class="form-select" id="preference" name="preference">
                                        <option>1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="presentation">Your Presentation (optional)</label>
                                <textarea class="form-control" id="presentation" name="presentation"
                                          placeholder="Your Presentation (optional)"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-3 mb-3">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-tweeter form-control text-capitalize me-2">cancel</button>
                                <button type="submit" class="btn btn-primary form-control text-capitalize">save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "photos") ? "active" : ''}}"
                     id="photos" role="tabpanel">


                    <div class="row align-items-center p-2">
                        <div class="col-lg-2">
                            <img id="showImg" style="height: 200px; width: 100%"
                                 src="{{asset('/asset/image/default.jpg')}}"
                                 alt="">
                        </div>

                        <div class="col-lg-2">
                            <div class="custom-file-upload mb-3">
                                <input type="file" id="image-uploader" hidden onchange="uploader(event, 'img')"/>
                                <input type="hidden" id="imgURL"/>
                                <label for="image-uploader"
                                       class="px-4 py-2 text-white text-uppercase fw-bold d-flex align-items-center justify-content-center">
                                    <span class="iconify me-3" data-icon="fluent:add-12-filled" data-width="20"
                                          data-height="20"></span>
                                    add
                                </label>
                            </div>

                            <button id="editButton"
                                    class="btn btn-primary form-control p-2 text-uppercase fw-bold mb-3 d-none">edit
                            </button>
                            <button id="removeButton"
                                    class="btn btn-primary form-control p-2 text-uppercase fw-bold d-none">delete
                            </button>
                        </div>
                    </div>

                    <div class="gallery my-3">
                        <span class="text-capitalize">photos/videos gallery</span>

                        <div class="row cloneContainer align-items-center"></div>

                    </div>

                    <div class="gallery my-3">
                        <span class="text-capitalize">private photos/videos (for chat use)</span>
                        <div class="row ">
                            <div class="col-lg-2 my-3">
                                <div class="gallery-item">
                                    <span class="iconify icon" data-icon="fluent:add-circle-24-filled" data-width="25"
                                          data-height="25"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="setting" role="tabpanel">
                    <form action="" class="text-white p-4">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="alert_email_label" for="alert_email">Alert By
                                        Email</label>
                                    <select id="alert_email" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="premium_status">Premium
                                        Status</label>
                                    <select id="premium_status" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="premium_status">Reminder
                                        Message</label>
                                    <select id="premium_status" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="premium_status">Colorblind
                                        Mode</label>
                                    <select id="premium_status" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="premium_status">Exhibits
                                        Notification</label>
                                    <select id="premium_status" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label"
                                           for="premium_status">Language</label>
                                    <select id="premium_status" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="premium_status">Sound
                                        Notification</label>
                                    <select id="premium_status" class="form-select">
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="col-lg-6 offset-lg-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <button data-bs-toggle="modal" data-bs-target="#suspendModal"
                                            class="btn btn-tweeter form-control text-capitalize me-2">Suspend My Account
                                    </button>
                                    <button class="btn btn-primary form-control text-capitalize">Delete My Account
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade show " id="favorite" role="tabpanel">
                    <ul>
                        <li>
                            <span>Favorite List</span>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade show " id="blocklist" role="tabpanel">
                    <span>There are no members in your list</span>
                </div>
                <div class="tab-pane fade show p-4" id="premiumList" role="tabpanel">
                    <div class="container">
                        <ul>
                            <li>
                                <h6>Payment By Credit</h6>
                                <span class="text-black-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, nostrum!</span>
                            </li>

                            <li class="dropdown-divider"></li>


                            <li class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input p-0 rounded-circle" type="radio"
                                           name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label align-items-center" for="flexRadioDefault1">
                                        <span class="text-tweeter fw-bold">3$/month</span>
                                        <span>for</span>
                                        <span class="fw-bold">2 Years</span>
                                        <br>
                                        <span class="fw-lighter text-black-50">Lorem ipsum dolor sit amet.</span>
                                    </label>
                                </div>
                                <span class="bg-warning p-2">75% reduction</span>
                            </li>
                            <li class="dropdown-divider"></li>


                            <li class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input p-0 rounded-circle" type="radio"
                                           name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label align-items-center" for="flexRadioDefault1">
                                        <span class="text-tweeter fw-bold">3$/month</span>
                                        <span>for</span>
                                        <span class="fw-bold">2 Years</span>
                                        <br>
                                        <span class="fw-lighter text-black-50">Lorem ipsum dolor sit amet.</span>
                                    </label>
                                </div>
                                <span class="bg-warning p-2">75% reduction</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{--    <div class="modal fade" id="privacyModal" tabindex="-1">--}}
    {{--        <div class="modal-dialog modal-dialog-centered">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-body">--}}

    {{--                    <div class="signup-content">--}}
    {{--                        <h4 class="text-capitalize text-center">Privacy & Save</h4>--}}
    {{--                        <hr>--}}

    {{--                        <form action="{{url('/api/auth/register')}}" id="registerForm">--}}
    {{--                            <span class="fw-bold my-2">Privacy</span>--}}

    {{--                            <div class="form-check">--}}
    {{--                                <input class="form-check-input" type="radio" name="privacy" id="privacy" value="public" checked>--}}
    {{--                                <label class="form-check-label" for="privacy">--}}
    {{--                                    Public--}}
    {{--                                </label>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-check">--}}
    {{--                                <input class="form-check-input" type="radio" name="privacy" id="privacy" value="private" checked>--}}
    {{--                                <label class="form-check-label" for="privacy">--}}
    {{--                                    Private--}}
    {{--                                </label>--}}
    {{--                            </div>--}}






    {{--                            <button type="submit" class="btn btn-primary form-control text-capitalize my-3 rounded-0 py-2">--}}
    {{--                                register--}}
    {{--                            </button>--}}

    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@push('custom-js')
    <script>
        let text = "";
        $(document).ready(function () {

            for (let step = 1; step <= 5; step++) {
                cloneUploadContainer('cloneContainer', step)
                if (step === 5) {
                    $('.cloneContainer').append(`
                            <div class="col-lg-2 col-sm-4 col-12 my-2 ">
                                <button class="btn form-control btn-primary" onclick="loadMore()">More</button>
                            </div>
                    `)
                }
            }




            let getUser = localStorage.getItem('user')
            let user = JSON.parse(getUser)
            console.log(user)

            $('#username').val(user.username)
            if (user && user.email) {
                $('#userEmail').removeClass('d-none')
                $('#email').val(user.email)
            }
            if (user && user.phone) {
                $('#userPhone').removeClass('d-none')
                $('#phone').val(user.phone)
            }
            $('#infoBirthYear').val(user.dob)
            $('#address').val(user.address)
            $('#presentation').val(user.presentation)
            $('#showImg').attr('src', user.image)
        })

        $('#informationForm').submit(function (e) {
            let token = localStorage.getItem('accessToken')
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form, token);
        })

        $('#uploadForm').submit(function (e) {
            let token = localStorage.getItem('accessToken')
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form, token);
        })

    </script>


@endpush
