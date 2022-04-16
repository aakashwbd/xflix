@extends('layouts.landing.index')
@section('content')
    <div class="container content-config">
        <div id="searchBannerImg">
            <div class="row align-items-center">
                <div class="col-lg-4 col-sm-12 order-sm-2 order-lg-1 mb-3">
                    <form action="{{url('api/search-user')}}" id="searchForm">
                        <h6 class="text-white fw-bold fs-5 mb-2">Peoples around me</h6>
                        <input type="text" class="form-control mb-3 getLocation" name="address" placeholder="Search Location">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <input type="text" class="form-control" name="minage" placeholder="10">
                            <label class="text-capitalize mx-3 text-white">to</label>
                            <input type="text" class="form-control" name="maxage" placeholder="49">
                        </div>
                        <select name="visitor" class="form-select mb-3">
                            <option value="" selected>Who Hosts and/or Visits</option>
                            <option value="host">Who Hosts</option>
                            <option value="visit">Who Visits</option>
                        </select>
                        <select name="member" class="form-select mb-3">
                            <option value="" selected>Suggested Members</option>
                            <option value="online">Online Members</option>
                            <option value="new">New Members</option>
                            <option value="all">All Members</option>
                        </select>
                        <input type="text" class="form-control mb-3" name="keyword" placeholder="Keyword">
                        <button type="submit" class="btn btn-primary form-control mb-3 text-capitalize">search</button>
                    </form>
                </div>

                <div class="col-lg-8 col-sm-12 order-sm-1 order-lg-2 mb-3">
                    <img class="bannerImg"
                         src=""
                         alt="">
                </div>
            </div>
        </div>

        <div id="searchList">
            <div class="py-2 my-5 bg-primary text-white d-flex align-items-center justify-content-center">
                <span class="iconify me-5 cursor-pointer" data-icon="ant-design:reload-outlined" data-width="20"
                      data-height="20"></span>
                <span> from 10 years old to 49 years old- who hosts and/or visits - in New York and around  </span>
                <span class="iconify ms-5 cursor-pointer" data-icon="ep:close" data-width="20" data-height="20"></span>
            </div>

            <ul class="list" id="homeSearchListContainer"></ul>

            <div class="text-center">
                <button class="btn text-white text-capitalize" id="loadMore">show more result</button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="flashModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-content">
                        <h6 class="text-capitalize text-center">send a flash</h6>
                        <hr>

                        <form action="">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="row row-cols-2">
                                        <div class="col mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 offset-lg-3">
                                            <button class="btn btn-primary form-control  mb-3">send</button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div id="chat-overlay" class="row"></div>--}}

{{--    <div id="chat_box" class="chat_box pull-right" style="display: none">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-md-12">--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat with <i class="chat-user"></i> </h3>--}}
{{--                        <span class="glyphicon glyphicon-remove pull-right close-chat"></span>--}}
{{--                    </div>--}}
{{--                    <div class="panel-body chat-area">--}}

{{--                    </div>--}}
{{--                    <div class="panel-footer">--}}
{{--                        <div class="input-group form-controls">--}}
{{--                            <textarea class="form-control input-sm chat_input" placeholder="Write your message here..."></textarea>--}}
{{--                            <span class="input-group-btn">--}}
{{--                                    <button class="btn btn-primary btn-sm btn-chat" type="button" data-to-user="" disabled>--}}
{{--                                        <i class="glyphicon glyphicon-send"></i>--}}
{{--                                        Send</button>--}}
{{--                                </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <input type="hidden" id="to_user_id" value="" />--}}
{{--    </div>--}}
@endsection
@push('custom-js')
    <script>
        /**
         * GET TOKEN & TOKEN BASED ACTION
         ***/
        const token = localStorage.getItem('accessToken');

        $(document).ready(function () {
            if (token === null) {
                $('.profile__image').addClass('img-blur')

            } else {
                $('.profile__image').removeClass('img-blur')
                let moreMenu = document.querySelector('#more-action')
                if(moreMenu){
                    moreMenu.setAttribute('data-bs-toggle', 'dropdown')
                }
            }


            document.querySelectorAll('.authAction').forEach(item => {
                item.addEventListener('click', function () {
                    if (token === null) {
                        $('#loginModal').modal('show')

                        if (item.getAttribute('data-event') === 'flash'){
                            $('#flashModal').modal('hide')
                        }
                    } else {
                        $('#loginModal').modal('hide')
                        if (item.getAttribute('data-event') === 'flash'){
                            $('#flashModal').modal('show')
                        }
                    }
                })
            })
        })


        $('#searchForm').submit(function (e) {
            e.preventDefault();
            let form = $(this);

            formSubmit("post", form);
        })

    </script>
@endpush


