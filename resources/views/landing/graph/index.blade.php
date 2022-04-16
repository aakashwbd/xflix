<?php
    $currentControllerName = Request::segment(1);
    $currentFullRouteName = Route::getFacadeRoot()
        ->current()
        ->uri();
?>


@extends('layouts.landing.index')
@section('content')
    <div id="profile" class="profile">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center border-0 bg-primary" id="profileNav" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "information") ? "active" : ''}}"
                            id="info-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Visits
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "photos") ? "active" : ''}}" id="photos-tab"
                            data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Flash
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Testimonial
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="favorite-tab" data-bs-toggle="tab" data-bs-target="#favorite"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Video Comment
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
                                <div class="form-group">
                                    <label class="form-label" id="phone_label" for="phone">Mobile</label>
                                    <input class="form-control" type="text" id="phone" name="phone" placeholder="">
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

{{--                    <form id="frm" method="post" class="needs-validation" novalidate="">--}}
{{--                        <!--Image container -->--}}
{{--                        <div class="row"--}}
{{--                             data-type="imagesloader"--}}
{{--                             data-errorformat="Accepted file formats"--}}
{{--                             data-errorsize="Maximum size accepted"--}}
{{--                             data-errorduplicate="File already loaded"--}}
{{--                             data-errormaxfiles="Maximum number of images you can upload"--}}
{{--                             data-errorminfiles="Minimum number of images to upload"--}}
{{--                             data-modifyimagetext="Modify immage">--}}
{{--                            <!-- Progress bar -->--}}
{{--                            <div class="col-12 order-1 mt-2">--}}
{{--                                <div data-type="progress" class="progress" style="height: 25px; display:none;">--}}
{{--                                    <div data-type="progressBar"--}}
{{--                                         class="progress-bar progress-bar-striped progress-bar-animated bg-success"--}}
{{--                                         role="progressbar" style="width: 100%;">Load in progress...--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Model -->--}}
{{--                            <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2"--}}
{{--                                 style="max-width:200px; display:none;">--}}
{{--                                <div class="ratio-box text-center" data-type="image-ratio-box">--}}
{{--                                    <img data-type="noimage"--}}
{{--                                         class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded"--}}
{{--                                         src="{{asset('/asset/image/default.jpg')}}" style="cursor:pointer;">--}}
{{--                                    <div data-type="loading" class="img-loading" style="color:#218838; display:none;">--}}
{{--                                        <span class="fa fa-2x fa-spin fa-spinner"></span>--}}
{{--                                    </div>--}}
{{--                                    <img data-type="preview"--}}
{{--                                         class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded"--}}
{{--                                         src="" style="display: none; cursor: default;">--}}
{{--                                    <span class="badge badge-pill badge-success p-2 w-50 main-tag"--}}
{{--                                          style="display:none;">Main</span>--}}
{{--                                </div>--}}
{{--                                <!-- Buttons -->--}}
{{--                                <div data-type="image-buttons" class="row justify-content-center mt-2">--}}
{{--                                    <button data-type="add" class="btn btn-outline-success" type="button"><span--}}
{{--                                            class="fa fa-camera mr-2"></span>Add--}}
{{--                                    </button>--}}
{{--                                    <button data-type="btn-modify" type="button" class="btn btn-outline-success m-0"--}}
{{--                                            data-toggle="popover" data-placement="right" style="display:none;">--}}
{{--                                        <span class="fa fa-pencil-alt mr-2"></span>Modify--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Popover operations -->--}}
{{--                            <div data-type="popover-model" style="display:none">--}}
{{--                                <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col p-0">--}}
{{--                                            <button data-operation="main"--}}
{{--                                                    class="btn btn-block btn-success btn-sm rounded-pill" type="button">--}}
{{--                                                <span class="fa fa-angle-double-up mr-2"></span>Main--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mt-2">--}}
{{--                                        <div class="col-6 p-0 pr-1">--}}
{{--                                            <button data-operation="left"--}}
{{--                                                    class="btn btn-block btn-outline-success btn-sm rounded-pill"--}}
{{--                                                    type="button"><span class="fa fa-angle-left mr-2"></span>Left--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6 p-0 pl-1">--}}
{{--                                            <button data-operation="right"--}}
{{--                                                    class="btn btn-block btn-outline-success btn-sm rounded-pill"--}}
{{--                                                    type="button">Right<span class="fa fa-angle-right ml-2"></span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mt-2">--}}
{{--                                        <div class="col-6 p-0 pr-1">--}}
{{--                                            <button data-operation="rotateanticlockwise"--}}
{{--                                                    class="btn btn-block btn-outline-success btn-sm rounded-pill"--}}
{{--                                                    type="button"><span class="fas fa-undo-alt mr-2"></span>Rotate--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6 p-0 pl-1">--}}
{{--                                            <button data-operation="rotateclockwise"--}}
{{--                                                    class="btn btn-block btn-outline-success btn-sm rounded-pill"--}}
{{--                                                    type="button">Rotate<span class="fas fa-redo-alt ml-2"></span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mt-2">--}}
{{--                                        <button data-operation="remove" class="btn btn-outline-danger btn-sm btn-block"--}}
{{--                                                type="button"><span class="fa fa-times mr-2"></span>Remove--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <div class="input-group">--}}
{{--                                <!--Hidden file input for images-->--}}
{{--                                <input id="files" type="file" name="files[]" data-button="" multiple=""--}}
{{--                                       accept="image/jpeg, image/png, image/gif," style="display:none;">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                    <!-- Upload Button -->--}}
{{--                    <div class="row mt-2">--}}
{{--                        <div class="col-md-4 offset-md-8 text-center mb-4">--}}
{{--                            <button id="btnContinue" type="submit" form="frm"--}}
{{--                                    class="btn btn-block btn-outline-success float-right" data-toggle="tooltip"--}}
{{--                                    data-trigger="manual" data-placement="top" data-title="Continue">--}}
{{--                                Continue<span id="btnContinueIcon" class="fa fa-chevron-circle-right ml-2"></span><span--}}
{{--                                    id="btnContinueLoading" class="fa fa-spin fa-spinner ml-2"--}}
{{--                                    style="display:none"></span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="row align-items-center p-2">
                        <div class="col-lg-2">
                            <img id="previewImg" style="height: 200px; width: 100%"
                                 src="{{asset('/asset/image/default.jpg')}}"
                                 alt="">
                        </div>

                        <div class="col-lg-2">
                            <div class="custom-file-upload mb-3">
                                <input type="file" id="file-uploader" hidden onchange="upload(this)" multiple/>
                                <label for="file-uploader"
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
                        <div class="row ">
                            <div class="col-lg-2 my-3">
                                <div class="gallery-item">
                                    <span class="iconify icon dropdown" data-bs-toggle="dropdown"
                                          data-icon="fluent:add-circle-24-filled" data-width="25"
                                          data-height="25"></span>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item border-bottom">
                                            <input id="uploadImg" type="file" hidden>
                                            <label for="uploadImg" class="cursor-pointer">Upload a Photo</label>
                                        </li>

                                        <li class="dropdown-item border-bottom">
                                            <input id="uploadVideo" type="file" hidden>
                                            <label for="uploadVideo" class="cursor-pointer">Upload a Video</label>
                                        </li>


                                        <li class="dropdown-item border-bottom">
                                            <input id="takeVideo" type="file" hidden>
                                            <label for="takeVideo" class="cursor-pointer">Take a Video</label>
                                        </li>


                                        <li class="dropdown-item">
                                            <span class="cursor-pointer">Cancel</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
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
@endsection
@push('custom-js')
    <script>
        $(document).ready(function () {
            let getUser = localStorage.getItem('user')
            let user = JSON.parse(getUser)

            $('#email').val(user.email)
        })

        $('#informationForm').submit(function (e) {
            let token = localStorage.getItem('accessToken')
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form, token);
        })

        $(document).ready(function () {

            //Form
            $frm = $('#frm');
            // Form submit
            $frm.submit(function (e) {
                var $form = $(this);
                var files = imagesloader.data('format.imagesloader').AttachmentArray;
                var il = imagesloader.data('format.imagesloader');
                if (il.CheckValidity())
                    alert('Upload ' + files.length + ' files');
                e.preventDefault();
                e.stopPropagation();
            });

        });




        var imagesloader = $('[data-type=imagesloader]').imagesloader({

            // animation speed
            fadeTime: 'slow',

            // input ID
            inputID: 'files',

            // maximum number of files
            maxfiles: 4,

            // max image bytes
            maxSize: 5000 * 1024,

            // min image count
            minSelect: 1,

            // allowed file types
            filesType: ["image/jpeg", "image/png", "image/gif"],

            // max/min height
            maxWidth: 1280,
            maxHeight: 1024,

            // image type
            imgType: "image/jpeg",

            // image quality from 0 to 1
            imgQuality: .9,

            // error messages
            errorformat: "Accepted format",
            errorsize: "Max size allowed",
            errorduplicate: "File already uploaded",
            errormaxfiles: "Max images you can upload",
            errorminfiles: "Minimum number of images to upload",

            // text for modify image button
            modifyimagetext: "Modify image",

            // angle of each rotation
            rotation: 90

        });


        upload = function (input){
            var file = $("#file-uploader").get(0).files[0];
            console.log(file)

            // if(file){
            //     var reader = new FileReader();
            //     reader.onload = function(){
            //         $("#previewImg").attr("src", reader.result);
            //     }
            //
            //     reader.readAsDataURL(file);
            //     console.log(file)
            // }


            $('.custom-file-upload').addClass('d-none')
            $('#editButton').removeClass('d-none')
            $('#removeButton').removeClass('d-none')
        }


    </script>


@endpush
