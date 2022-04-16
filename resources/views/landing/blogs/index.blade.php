@extends('layouts.landing.index')
@section('content')

    <div id="blog" class="blog container">
        <nav class="bg-primary">
            <div class="nav nav-tabs justify-content-center border-0" id="nav-tab" role="tablist">

                <button
                    class="nav-link bg-transparent border-0 {{ ((request()->get('tab')) === "blogs") ? "active" : ''}}  text-white"
                    id="nav-recent-tab" data-bs-toggle="tab" data-bs-target="#nav-recent"
                    type="button" role="tab">Recent
                </button>


                <button
                    class="nav-link bg-transparent border-0 {{ ((request()->get('tab')) === "comments/blogid") ? "active" : ''}}  text-white"
                    id="nav-comment-tab" data-bs-toggle="tab" data-bs-target="#nav-comment"
                    type="button" role="tab">Comment
                </button>
            </div>
        </nav>

        <div class="tab-content bg-white p-4" id="nav-tabContent">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="tab-pane fade show  {{ ((request()->get('tab')) === "blogs") ? "active" : ''}}"
                         id="nav-recent" role="tabpanel">
                        <img class="img-fluid"
                             src="https://images.unsplash.com/photo-1545239351-ef35f43d514b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                             alt="">
                        <h6 class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aperiam
                            cupiditate</h6>
                        <span class="text-black-50 fst-italic text-capitalize">14 april, 2022</span>
                        <a href="{{url('/blogs?tab=comments')}}/{{'blogid'}}">
                            <article class="text-black-50 blog-short-description my-2">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium esse id
                                iste magni nisi quae repellat. Cupiditate, ipsum, natus! Animi delectus enim
                                necessitatibus quam similique sint, voluptate. Blanditiis eum incidunt
                                molestias, nulla odio quidem saepe tempore. Alias aliquid culpa cupiditate
                                dolores ipsam laboriosam libero minima omnis quia quidem, rerum similique
                                voluptates, voluptatum. Amet assumenda autem beatae consequatur corporis, culpa
                                cumque cupiditate dolor dolore dolorem ducimus eligendi eos eum explicabo facere
                                fugiat id illo in ipsam ipsum laboriosam laudantium libero nam nesciunt odit
                                officiis, omnis optio perspiciatis praesentium quos reiciendis repellat saepe
                                sit soluta sunt, tempore ut. Inventore quia sint voluptatum!
                            </article>
                        </a>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12 my-5">
                                <img class="img-fluid"
                                     src="https://images.unsplash.com/photo-1545239351-ef35f43d514b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                                     alt="">

                                <h6 class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Aperiam
                                    cupiditate</h6>
                                <span class="text-black-50 fst-italic text-capitalize">14 april, 2022</span>

                                <a href="{{url('/blogs?tab=comments')}}/{{'blogid'}}">
                                    <article class="text-black-50 blog-short-description my-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                        esse id
                                        iste
                                        magni nisi quae repellat. Cupiditate, ipsum, natus! Animi delectus enim
                                        necessitatibus quam similique sint, voluptate. Blanditiis eum incidunt
                                        molestias,
                                        nulla odio quidem saepe tempore. Alias aliquid culpa cupiditate dolores
                                        ipsam
                                        laboriosam libero minima omnis quia quidem, rerum similique voluptates,
                                        voluptatum.
                                        Amet assumenda autem beatae consequatur corporis, culpa cumque
                                        cupiditate dolor
                                        dolore dolorem ducimus eligendi eos eum explicabo facere fugiat id illo
                                        in ipsam
                                        ipsum laboriosam laudantium libero nam nesciunt odit officiis, omnis
                                        optio
                                        perspiciatis praesentium quos reiciendis repellat saepe sit soluta sunt,
                                        tempore
                                        ut.
                                        Inventore quia sint voluptatum!
                                    </article>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade show {{ ((request()->get('tab')) === "comments/blogid") ? "active" : ''}}"
                         id="nav-comment" role="tabpanel">
                            hello
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-12">
                    <div class="title">
                        <span class="bg-primary text-white py-1 px-4">Popular</span>
                    </div>

                    <div class="d-flex align-items-center my-3">
                        <img class="avatar-sm-1"
                             src="https://images.unsplash.com/photo-1545239351-ef35f43d514b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                             alt="">

                        <div class="ms-3">
                            <a href="{{url('/blogs?tab=comments')}}/{{'blogid'}}" class="text-black d-block">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Excepturi, nam?</a>

                            <span class="text-black-50 text-capitalize">14 april, 2022</span>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>

@endsection
