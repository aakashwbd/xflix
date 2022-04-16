@extends('layouts.landing.index')
@section('content')
    <div class="container" id="weekVideo">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12 col-12">
                <video width="100%" height="400" class="border-warning" controls>
                    <source src="{{asset('/asset/video/Coke Studio Season 9- Afreen Afreen- Rahat Fateh Ali Khan & Momina Mustehsan.mp4')}}" type="video/mp4">
                </video>
            </div>

            <div class="col-lg-6 col-sm-12 col-12">
                <h4 class="text-capitalize text-white">video of the week</h4>
                <hr class="text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="text-white fw-bold text-capitalize">video title</h5>
                    <a href="" class="text-white text-capitalize">learn more</a>
                </div>

                <div class="d-flex align-items-center">
                    <span class="iconify text-warning me-2" data-icon="clarity:star-solid"></span>
                    <span class="iconify text-warning me-2" data-icon="clarity:star-solid"></span>
                    <span class="iconify text-warning me-2" data-icon="clarity:star-solid"></span>
                    <span class="iconify text-warning me-2" data-icon="clarity:star-solid"></span>
                    <span class="iconify text-warning me-2" data-icon="clarity:star-solid"></span>
                    <span class="text-white mx-3">50 grades - 211 views</span>
                </div>
                <span class="text-white-50 fst-italic">published 2 years ago</span>

                <div class="d-flex align-items-center my-3">
                    <img class="avatar-sm"
                         src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                         alt="">

                    <div class="ms-4">
                        <h6 class="text-white-50 text-capitalize">
                            <span class="iconify text-primary" data-icon="carbon:location-filled" data-width="25" data-height="25"></span>
                            paris
                        </h6>

                        <span class="text-capitalize text-white-50 fs-6">name | 36y.o</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 my-3 bg-primary d-flex justify-content-between text-white">
            <span>from 10 years old to 49 years old- who hosts and/or visits - in New York and around </span>
            <span class="iconify cursor-pointer" data-bs-toggle="modal" data-bs-target="#videoModal" data-icon="ri:equalizer-line" data-width="20" data-height="20"></span>

        </div>
        <div class="row" id="videoContent">





{{--            <div class="col-lg-6 col-sm-12 offset-lg-3">--}}
{{--                <h6 class="text-white text-capitalize text-center">terms & condition</h6>--}}
{{--                <span class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus assumenda cumque doloribus ducimus, eligendi nihil nobis provident repellat repellendus voluptatem.</span>--}}

{{--                <div class="text-center my-3">--}}
{{--                    <button class="btn btn-primary text-capitalize py-2 px-5 rounded-0">close</button>--}}
{{--                </div>--}}


{{--            </div>--}}
        </div>
    </div>



    <div class="modal fade" id="videoModal" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="text-capitalize">Sort Video By</h6>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-12 col-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Keyword Search">
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12 mb-3">
                                <div class="form-group">
                                    <select name="" id="" class="form-select">
                                        <option value="">Filter By Date</option>
                                        <option value="">Filter By Note</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12 mb-3">
                                <div class="form-group">
                                    <select name="" id="" class="form-select">
                                        <option value="">All Videos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12 mb-3">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <input type="text" class="form-control" placeholder="10">
                                    <label class="text-capitalize mx-3 text-white">to</label>
                                    <input type="text" class="form-control" placeholder="49">
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

@endsection
@push('custom-js')
    <script>

        $.ajax({
            url: window.origin + '/api/video/get-all',
            type: 'GET',
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (res) {

                getVideoContent(res)

            }, error: function (jqXhr, ajaxOptions, thrownError) {
                console.log(jqXhr)
            }
        });

        function getVideoContent(res) {
            res.data.forEach(item=>{
                $('#videoContent').append(`
                <div class="col-lg-4 col-sm-12 col-12 mb-3">
                <a href="{{url('video/${item.id}')}}" target="_blank">
                <video width="100%" height="300" class="border-warning">
                    <source src="${item.video}" type="video/mp4">
                </video>
</a>

                <div>
                    <h6 class="text-white">video title</h6>



                    <div class="d-flex align-items-center">
                        <span class="iconify text-warning me-2 star" data-video-id='${item.id}' data-rating-value='1' data-icon="clarity:star-solid"></span>
                        <span class="iconify text-warning me-2 star" data-video-id='${item.id}' data-rating-value='2' data-icon="clarity:star-solid"></span>
                        <span class="iconify text-warning me-2 star" data-video-id='${item.id}' data-rating-value='3' data-icon="clarity:star-solid"></span>
                        <span class="iconify text-warning me-2 star" data-video-id='${item.id}' data-rating-value='4' data-icon="clarity:star-solid"></span>
                        <span class="iconify text-warning me-2 star" data-video-id='${item.id}' data-rating-value='5' data-icon="clarity:star-solid"></span>
                        <span class="text-white mx-3">50 grades - 211 views</span>
                    </div>
                    <span class="text-white-50 fst-italic">published 2 years ago</span>
                </div>

                <div class="d-flex align-items-center my-3">
                    <img class="avatar-sm"
                         src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                         alt="">

                    <div class="ms-4">
                        <h6 class="text-white-50 text-capitalize">
                            <span class="iconify text-primary" data-icon="carbon:location-filled" data-width="25" data-height="25"></span>
                            paris
                        </h6>

                        <span class="text-capitalize text-white-50 fs-6">name | 36y.o</span>
                    </div>
                </div>
            </div>
                `)
            })
        }


    </script>
@endpush
