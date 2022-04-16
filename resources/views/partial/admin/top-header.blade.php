<header class="header primary-bg">
    <div class="d-flex align-items-center">

        <button class="btn btn-sm sidebar-expand-btn d-lg-none">
            <i class="bi bi-list"></i>
        </button>

        <div class="ms-auto">
            <span class="iconify me-3" data-icon="clarity:bell-outline-badged" data-width="30" data-height="30"></span>

            <img src="{{asset('asset/image/default.jpg')}}" class="avatar-sm rounded-circle cursor-pointer " data-bs-toggle="dropdown" alt="">
            <ul class="dropdown-menu align-items-center">
                <li>
                    <a class="dropdown-item" href="">
                        <span class="iconify" data-icon="carbon:user-avatar" style="color: black;" data-width="20"
                              data-height="20"></span>
                        Profile
                    </a>
                </li>
                <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#password-modal">
                        <span class="iconify" data-icon="fluent:key-32-regular" style="color: black;" data-width="20"
                              data-height="20"></span>
                        Change Password
                    </button>
                </li>



                <li>
                    <a class="dropdown-item primary-color" href="#">
                        <span class="iconify" data-icon="ant-design:logout-outlined" data-width="20"
                              data-height="20"></span>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
