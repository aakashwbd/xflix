@extends('layouts.landing.index')
@section('content')
    <div class="container content-config">
        <div id="searchList">
            <div class="py-2 my-5 bg-primary text-white d-flex align-items-center justify-content-center">
                <span class="iconify me-5 cursor-pointer" data-icon="ant-design:reload-outlined" data-width="20"
                      data-height="20"></span>
                <span> from 10 years old to 49 years old- who hosts and/or visits - in New York and around  </span>
                <span class="iconify ms-5 cursor-pointer" data-icon="ep:close" data-width="20" data-height="20"></span>
            </div>

            <ul class="list" id="homeSearchListContainer">
                <li class="list-item py-2 restrictedList ">
                    <div class="row">
                        <div class="col-lg-1 col-sm-1 col-3">
                            <img class="profile__image"
                                 src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                                 alt="">
                            <span>Hiv Status: HIV Negative</span>
                        </div>
                        <div class="col-lg-8 col-sm-6 col-6">
                            <div class="d-flex align-items-center mb-3">
                                <span class="iconify me-3 text-primary" data-icon="entypo:location" data-width="30"
                                      data-height="30"></span>
                                <span>Dhaka, Bangladesh</span>
                                <span class="mx-3">|</span>
                                <span class="iconify text-primary" data-icon="clarity:new-solid" data-width="30"
                                      data-height="30"></span>
                            </div>
                            <div class="d-flex align-items-center">
                        <span class="iconify text-success me-3" data-icon="ci:dot-03-m" data-width="30"
                              data-height="30"></span>
                                <span class="me-3">iftekher2233</span>
                                <span class="me-3">29y.o</span>
                                <span>host/visit</span>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-3 col-3">
                            <ul class="extra-list">
                                <li class="extra-list-item">
                                    <span
                                        data-event="message"
                                        class="iconify cursor-pointer extra-list-link authAction"
                                        data-icon="bxs:message-rounded"
                                        data-width="30"
                                        data-height="30"></span>
                                </li>

                                <li class="extra-list-item">
                                    <span
                                        data-event="flash"

                                        class="iconify cursor-pointer extra-list-link authAction flash"
                                        data-icon="carbon:flash-filled"
                                        data-width="30"
                                        data-height="30"></span>
                                </li>

                                <li class="extra-list-item ">
                                    <span
                                        data-event="more-action"
                                        class="iconify cursor-pointer extra-list-link dropdown authAction more-action"
                                        data-icon="fluent:add-square-24-filled"
                                        data-width="30"
                                        data-height="30"
                                        id="more-action"
                                    ></span>


                                    <ul class="dropdown-menu dropdown-menu-end p-2">
                                        <li class="dropdown-item">
                                            <button class="btn form-control text-capitalize">
                                        <span class="iconify" data-icon="carbon:favorite" data-width="20"
                                              data-height="20"></span>
                                                <span>favorite</span>
                                            </button>
                                        </li>
                                        <li class="dropdown-divider"></li>

                                        <li class="dropdown-item">
                                            <button class="btn form-control text-capitalize">
                                    <span class="iconify" data-icon="carbon:favorite" data-width="20"
                                          data-height="20"></span>
                                                <span>map</span>
                                            </button>
                                        </li>
                                        <li class="dropdown-divider"></li>

                                        <li class="dropdown-item">
                                            <button class="btn form-control text-capitalize" data-bs-toggle="modal"
                                                    data-bs-target="#alertModal">
                                    <span class="iconify" data-icon="carbon:favorite" data-width="20"
                                          data-height="20"></span>
                                                <span>alert</span>
                                            </button>


                                        </li>
                                        <li class="dropdown-divider"></li>

                                        <li class="dropdown-item">
                                            <button class="btn form-control text-capitalize">
                                    <span class="iconify" data-icon="carbon:favorite" data-width="20"
                                          data-height="20"></span>
                                                <span>blocklist</span>
                                            </button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>

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
                if (moreMenu) {
                    moreMenu.setAttribute('data-bs-toggle', 'dropdown')
                }
            }


            document.querySelectorAll('.authAction').forEach(item => {
                item.addEventListener('click', function () {
                    if (token === null) {
                        $('#loginModal').modal('show')

                        if (item.getAttribute('data-event') === 'flash') {
                            $('#flashModal').modal('hide')
                        }
                    } else {
                        $('#loginModal').modal('hide')
                        if (item.getAttribute('data-event') === 'flash') {
                            $('#flashModal').modal('show')
                        }
                    }
                })
            })
        })


    </script>
@endpush


