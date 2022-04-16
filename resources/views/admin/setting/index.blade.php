@extends('layouts.admin.index')
@section('content')
    <main class="main">
        <section class="dashboard-setting">
            <form action="{{url('api/admin/setting/store')}}" id="settingForm">
                <span class="portion-title">Basic Setting</span>
                <div class="row my-3">
                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="system_name" id="system_name_label" class="form-label system_name_label">System
                                Name *</label>
                            <input type="text" id="system_name" name="system_name" class="form-control system_name">
                            <span class="text-primary system_name_error" id="system_name_error">e</span>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="web_version" id="web_version_label" class="form-label web_version_label">Web
                                Version</label>
                            <input type="text" id="web_version" name="web_version" class="form-control web_version">
                            <span class="text-primary web_version_error" id="web_version_error">e</span>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <label for="logo" class="form-label">Logo *</label>
                        <input type="file" id="logo-uploader" hidden onchange="uploader(event, '','','logo')"/>
                        <input type="hidden" id="logo" name="image['logo']">
                        <label for="logo-uploader"
                               class="border-dashed cursor-pointer text-black-50 py-2 rounded text-uppercase d-flex align-items-center">
                                    <span class="iconify mx-3" data-icon="fluent:add-12-filled" data-width="20"
                                          data-height="20"></span>
                            upload logo
                        </label>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <label for="logo-icon" class="form-label">Logo Icon *</label>
                        <input type="file" id="logo-icon-uploader" hidden onchange="uploader(event,'','','logo-icon')"/>
                        <input type="hidden" id="logo-icon" name="image['logo-icon']">
                        <label for="logo-icon-uploader"
                               class="border-dashed cursor-pointer text-black-50 py-2 rounded text-uppercase d-flex align-items-center">
                                    <span class="iconify mx-3" data-icon="fluent:add-12-filled" data-width="20"
                                          data-height="20"></span>
                            upload logo icon
                        </label>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="copyright" id="copyright_label" class="copyright_label form-label">Copyrights
                                *</label>
                            <input type="text" id="copyright" name="copyright" class="form-control copyright">
                            <span class="text-primary copyright_error" id="copyright_error">e</span>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="email" id="email_label" class="form-label email_label">Mail Address *</label>
                            <input type="text" id="email" name="email" class="form-control email">
                            <span class="text-primary email_error" id="email_error">e</span>
                        </div>
                    </div>
                </div>


                <div class="d-flex align-items-center">
                    <span class="portion-title">Social Account</span>

                    <button class="btn btn-primary rounded-32 mx-3">Add More Social Account</button>
                </div>

                <div class="row my-3">
                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" id="facebook" name="social['facebook']" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="text" id="twitter" name="social['twitter']" class="form-control">
                        </div>
                    </div>

                </div>


                <div class="d-flex align-items-center">
                    <span class="portion-title">Help</span>
                    <button class="btn btn-primary rounded-32 mx-3">Add FAQ's</button>
                </div>

                <div class="row my-3">
                    <div class="col-lg-6 col-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" name="help[]['question']" id="question" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea type="text" name="help[]['answer']" id="answer" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" name="help[]['question']" id="question" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea type="text" name="help[]['answer']" id="answer" class="form-control"></textarea>
                        </div>
                    </div>
                </div>


                <span class="portion-title">Age Range</span>

                <div class="row my-3">
                    <div class="col-lg-6 col-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="min-age" class="form-label">Minimum</label>
                            <input type="text" name="age['min-age']" id="min-age" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="max-age" class="form-label">Maximum</label>
                            <input type="text" name="age['max-age']" id="max-age" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="d-flex align-items-center">
                    <span class="portion-title">Partner Site's</span>
                    <button class="btn btn-primary rounded-32 mx-3">Add</button>
                </div>

                <div class="row my-3">
                    <div class="col-lg-6 col-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="website-name" class="form-label">Website Name</label>
                            <input type="text" name="partner_site[]['website-name']" id="website-name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="website-url" class="form-label">Website URL</label>
                            <input type="text" name="partner_site[]['website-url']" id="website-url" class="form-control">
                        </div>
                    </div>
                </div>

                <span class="portion-title">Legal Information</span>

                <div class="form-group my-3">
                    <label for="website-description" class="form-label">Web Description</label>
                    <textarea type="text" name="legal_information['description']" id="website-description"
                              class="form-control"></textarea>
                </div>

                <div class="form-group my-3">
                    <label for="website-description" class="form-label">About Us (About Company)</label>
                    <textarea type="text" name="legal_information['about']" id="website-description"
                              class="form-control"></textarea>
                </div>

                <div class="form-group my-3">
                    <label for="terms" class="form-label">Terms of Use</label>
                    <textarea type="text" name="legal_information['terms_of_use']" id="terms" class="form-control"></textarea>
                </div>

                <div class="form-group my-3">
                    <label for="notice" class="form-label">Legal Notice</label>
                    <textarea type="text" name="legal_information['notice']" id="notice" class="form-control"></textarea>
                </div>

                <div class="form-group my-3">
                    <label for="privacy" class="form-label">Privacy Policy</label>
                    <textarea type="text" name="legal_information['privacy_policy']" id="privacy" class="form-control"></textarea>
                </div>

                <div class="form-group my-3">
                    <label for="refund" class="form-label">Refund Policy</label>
                    <textarea type="text" name="legal_information['refund_policy']" id="refund" class="form-control"></textarea>
                </div>


                <button type="submit" class="btn btn-primary my-3">Save</button>

            </form>
        </section>
    </main>
@endsection

@push('custom-js')
    <script>
        $('#settingForm').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form);
        })
        let url = window.origin + '/api/admin/setting/get-all'
        getEditData(url)
    </script>
@endpush
