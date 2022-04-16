<?php
    $currentControllerName = Request::segment(1);
    $currentFullRouteName = Route::getFacadeRoot()
        ->current()
        ->uri();
?>


<nav class="navbar navbar-expand-lg navbar-dark " id="site-nav">
    <div class="container">
        <a class="navbar-brand text-capitalize" href="{{url('/')}}">
            <img src="{{asset('asset/image/default.jpg')}}" class="avatar-sm" alt="">
        </a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#topNavigation"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topNavigation">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ $currentFullRouteName == '/' || '' ? 'active' : '' }}" aria-current="page" href="{{url('/')}}">members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentControllerName == 'ads' || '' ? 'active' : '' }}" href="{{url('/ads')}}">ads</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentControllerName == 'live' || '' ? 'active' : '' }}" href="{{url('/live')}}">live</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentControllerName == 'videos' || '' ? 'active' : '' }}" href="{{url('/videos')}}">videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentControllerName == 'maps' || '' ? 'active' : '' }}" href="{{url('/maps')}}">map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentControllerName == 'blogs' || '' ? 'active' : '' }}" href="{{url('/blogs?tab=blogs')}}">blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentControllerName == 'inscription' || '' ? 'active' : '' }}" href="{{url('/inscription')}}">inscription</a>
                </li>
                <li class="nav-item" id="connectionNavItem">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">connection</a>
                </li>
                <li class="nav-item d-none" id="graph">
                    <a href="{{url('/graph')}}" class="nav-link {{ $currentControllerName == 'graph' || '' ? 'active' : '' }}">
                        <span class="iconify" data-icon="bi:flag" data-width="20" data-height="20"></span>
                    </a>

                </li>
                <li class="nav-item dropdown d-none" id="message" >
                    <a href="#" class="nav-link " data-bs-toggle="dropdown">
                        <span class="iconify" data-icon="bx:message-rounded" data-width="20" data-height="20"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        hi
                    </ul>

                </li>

                <li class="nav-item dropdown d-none" id="profileNavItem">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown">
                        <img class="avatar-sm rounded-circle"
                             src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                             alt="">
                    </a>

                    <ul class="dropdown-menu-end dropdown-menu text-center">
                        <li class="border-bottom py-2">
                            <a href="{{url('profile?tab=information')}}" class="dropdown-item text-capitalize">edit my profile</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="" class="dropdown-item text-capitalize">show</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('profile?tab=photos')}}" class="dropdown-item text-capitalize">photos/videos</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('profile?tab=setting')}}" class="dropdown-item text-capitalize">setting</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('profile?tab=favorite')}}" class="dropdown-item text-capitalize">favorite</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('profile?tab=blacklist')}}" class="dropdown-item text-capitalize">blacklist</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('profile?tab=premium')}}" class="dropdown-item text-capitalize">premium access</a>
                        </li>
                        <li class="">
                            <a href="{{url('profile?tab=invisible')}}" class="dropdown-item text-capitalize">become invisible</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown d-none" id="moreMenuDots">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown">
                        <span class="iconify" data-icon="bx:dots-vertical-rounded" data-width="25"
                              data-height="25"></span>
                    </a>

                    <ul class="dropdown-menu-end dropdown-menu text-center">
                        <li class="border-bottom py-2">
                            <a href="{{url('/about')}}" class="dropdown-item text-capitalize">about</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('/blogs?tab=blogs')}}" class="dropdown-item text-capitalize">blog</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('/information?tab=faq')}}" class="dropdown-item text-capitalize">help</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="#" data-bs-target="#contactModal" data-bs-toggle="modal" class="dropdown-item text-capitalize">contact</a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="{{url('/information?tab=legal')}}" class="dropdown-item text-capitalize">legal notice</a>
                        </li>
                        <li class="">
                            <a href="#" class="dropdown-item text-capitalize" id="signOut">disconnect</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('custom-js')
    <script>
        $(document).ready(function (){
            let getToken = localStorage.getItem('accessToken')

            if(getToken !== null){
                $('#profileNavItem').removeClass('d-none')
                $('#moreMenuDots').removeClass('d-none')
                $('#graph').removeClass('d-none')
                $('#message').removeClass('d-none')
                $('#connectionNavItem').addClass('d-none')
            }

        })




    </script>
@endpush


{{--<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body">--}}

{{--                --}}

{{--                <div class="forgot-content">--}}
{{--                    <h4 class="text-capitalize text-center">password forgotten</h4>--}}
{{--                    <hr>--}}
{{--                    <div class="text-center">--}}
{{--                        <span class="fs-6 text-black-50">Enter your email for reset password</span>--}}
{{--                    </div>--}}


{{--                    <form action="">--}}
{{--                        <input class="form-control my-3" type="text" placeholder="email">--}}
{{--                        <div class="text-center">--}}
{{--                            <button class="btn btn-primary form-control w-75 text-center">submit</button>--}}
{{--                            <span class="d-block fs-6 text-black-50">Lorem ipsum dolor sit amet!</span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}


{{--                <div class="reset-password-content">--}}
{{--                    <h4 class="text-capitalize text-center">please define your new passwword</h4>--}}
{{--                    <hr>--}}
{{--                    <form action="">--}}
{{--                        <input class="form-control my-3" type="text" placeholder="password">--}}
{{--                        <input class="form-control my-3" type="text" placeholder="confirm password">--}}
{{--                        <div class="text-center">--}}
{{--                            <button class="btn btn-primary form-control w-75 text-center">submit</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

