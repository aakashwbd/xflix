@extends('layouts.landing.index')
@section('content')
    <div id="profile" class="profile">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center border-0 bg-primary" id="profileNav" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "faq") ? "active" : ''}}" id="info-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab" aria-controls="home" aria-selected="true">Help</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "terms") ? "active" : ''}}" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="profile" aria-selected="false">Terms of use</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "legal") ? "active" : ''}}" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting" type="button" role="tab" aria-controls="contact" aria-selected="false">Legal Notice</button>
                </li>
            </ul>
            <div class="tab-content bg-white" id="profileNavContent">
                <div class="tab-pane fade show  p-4 {{ ((request()->get('tab')) == "faq") ? "active" : ''}}" id="information" role="tabpanel">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <input type="search" placeholder="Search.." class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <span class="text-black-50">The FAQ answers practical questions that you can ask yourself using the site. A search engin is available if you can not find a response <a
                                        href="#" data-bs-target="#contactModal" data-bs-toggle="modal" class="text-decoration-underline text-black-50">contact us</a> </span>
                            </div>
                        </div>


                        <div class="accordion my-3" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Question 1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, atque culpa dignissimos distinctio dolorem ea error est eum expedita illum minus modi nam nisi pariatur perferendis praesentium quae quos ratione reprehenderit temporibus ullam ut voluptas! Ab, consectetur, doloribus, eum exercitationem fugiat hic ipsam nobis nostrum odit quas ullam vel voluptas.</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Question 2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, atque culpa dignissimos distinctio dolorem ea error est eum expedita illum minus modi nam nisi pariatur perferendis praesentium quae quos ratione reprehenderit temporibus ullam ut voluptas! Ab, consectetur, doloribus, eum exercitationem fugiat hic ipsam nobis nostrum odit quas ullam vel voluptas.</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Question 3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, atque culpa dignissimos distinctio dolorem ea error est eum expedita illum minus modi nam nisi pariatur perferendis praesentium quae quos ratione reprehenderit temporibus ullam ut voluptas! Ab, consectetur, doloribus, eum exercitationem fugiat hic ipsam nobis nostrum odit quas ullam vel voluptas.</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade show p-4" id="photos" role="tabpanel">
                    ..
                </div>
                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "legal") ? "active" : ''}}" id="setting" role="tabpanel">
                    <div class="container">
                        <h4 class="my-3">Legal Notice</h4>

                        <span>The site www.www.com is published by</span>
                        <address>Project X Ltd.</address>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
