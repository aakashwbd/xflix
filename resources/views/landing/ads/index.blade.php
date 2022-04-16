@extends('layouts.landing.index')
@section('content')
    <div class="container content-config">
        <div id="searchBannerImg">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12 order-sm-2 order-lg-1 mb-3">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-10 col-12 offset-lg-1">

                                <div class="custom-file-upload my-3">
                                    <input type="file" id="file-uploader" hidden/>
                                    <label for="file-uploader">Place an ad</label>
                                </div>

                                <h6 class="text-white text-capitalize">filter ads:</h6>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control mb-3" placeholder="Search Location">
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="" class="form-select mb-3">
                                            <option value="" selected>Who Hosts and/or Visits</option>
                                            <option value="" >Who Hosts</option>
                                            <option value="" >Who Visits</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <input type="text" class="form-control" placeholder="10">
                                            <label class="text-capitalize mx-3 text-white">to</label>
                                            <input type="text" class="form-control" placeholder="49">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control mb-3" placeholder="keyword">
                                    </div>

                                    <div class="col-lg-6">
                                        <select name="" class="form-select mb-3">
                                            <option value="" selected>The Closest</option>
                                            <option value="">Online Members</option>
                                            <option value="" >Recent Members</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary form-control mb-3">search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-sm-12 order-sm-1 order-lg-2 mb-3">
                    <img class="bannerImg"
                         src=""
                         alt="">
                </div>
            </div>
        </div>
{{--        <div id="searchBannerImg">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-6 col-sm-6 col-12">--}}

{{--                    <form action="">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-10 col-12 offset-lg-1">--}}

{{--                                <div class="custom-file-upload my-3">--}}
{{--                                    <input type="file" id="file-uploader" hidden/>--}}
{{--                                    <label for="file-uploader">Place an ad</label>--}}
{{--                                </div>--}}

{{--                                <h6 class="text-white text-capitalize">filter ads:</h6>--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <input type="text" class="form-control mb-3" placeholder="Search Location">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <select name="" class="form-select mb-3">--}}
{{--                                            <option value="" selected>Who Hosts and/or Visits</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="d-flex align-items-center justify-content-center mb-3">--}}
{{--                                            <input type="text" class="form-control" placeholder="18">--}}
{{--                                            <label class="text-capitalize mx-3">to</label>--}}
{{--                                            <input type="text" class="form-control" placeholder="49">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <input type="text" class="form-control mb-3" placeholder="keyword">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6">--}}
{{--                                        <select name="" class="form-select mb-3">--}}
{{--                                            <option value="" selected>Suggested Members</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button class="btn btn-primary form-control mb-3">search</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-sm-6 col-12">--}}
{{--                    <img class=""--}}
{{--                         src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"--}}
{{--                         alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div id="searchList">
            <div class="py-2 my-5 bg-primary text-white d-flex align-items-center justify-content-center">
                <span class="iconify me-5 cursor-pointer" data-icon="ant-design:reload-outlined" data-width="20"
              data-height="20"></span>
                <span> from 10 years old to 49 years old- who hosts and/or visits - in New York and around </span>
                <span class="iconify ms-5 cursor-pointer" data-icon="ep:close" data-width="20" data-height="20"></span>
            </div>

            <div class="row row-cols-2">
                <div class="col mb-4">
                    <img class="img-fluid"
                         src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                         alt="">
                </div>

                <div class="col mb-4">
                    <img class="img-fluid"
                         src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                         alt="">
                </div>

                <div class="col mb-4">
                    <img class="img-fluid"
                         src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                         alt="">
                </div>

                <div class="col mb-4">
                    <img class="img-fluid"
                         src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                         alt="">
                </div>
            </div>

            <div class="text-center">
                <button class="btn text-white text-capitalize">show more result</button>
            </div>
        </div>
    </div>
@endsection
