// window.prototype = this;
require('./bootstrap')
/***
 * Landing Scroll to Navbar changed background
 ***/
window.onscroll = function () {
    let navbar = document.querySelector('#site-nav')
    if (window.pageYOffset > 0) {
        navbar.classList.add('scrolled')
    } else {
        navbar.classList.remove('scrolled')
    }
}

var swiper = new Swiper(".partnerSwiper", {
    slidesPerView: 3, spaceBetween: 30, autoplay: true,
});



/***
 * HELPER FUNCTION
 ***/
setBirthYear = function (divID, defaultYear, minAge, maxAge){
    $.dobPicker({
        yearSelector: divID,
        yearDefault: defaultYear,
        minimumAge: minAge,
        maximumAge: maxAge
    });
}


/***
 * STARTUP ACTION
 ***/
$(document).ready(function () {
    const age = {
        defaultYear: 'Birth Year',
        minAge: 10,
        maxAge: 100
    }

    setBirthYear('#dobyear', age.defaultYear, age.minAge, age.maxAge);
    setBirthYear('#infoBirthYear', age.defaultYear, age.minAge, age.maxAge);

    if (getCookie('COOKIE_AGE')) {
        $.year = getCookie('COOKIE_AGE')
        setBirthYear('#inscriptionBirthYear', $.year, age.minAge, age.maxAge);
        $('#confirmModal').modal('hide')
    } else {
        $('#confirmModal').modal('show')
    }


    /**
     * AGE RESTRICTION
     ***/
    $(document).on('click', '#birthConfirmDialogBtn', function (e) {
        e.preventDefault();
        let birthYear = $('#dobyear').val();

        if (birthYear === 'Birth Year') {
            let errMsg = $('#confirmErrMsg')
            errMsg.removeClass('d-none')
        } else {
            document.cookie = "COOKIE_AGE=" + birthYear + "; expires=" + new Date(86400000 + Date.now()).toUTCString() + ';'
            $('#confirmModal').modal('hide')
            $('#locationModal').modal('show')
        }
    })

    /**
     * LOCATION FORM
     */
    $(document).on('click', '#location-btn', function (e){
        e.preventDefault();
        let location = $('.locationInput').val()

        if (location === ''){
            $('.locationError').removeClass('d-none');
        }else{
            document.cookie = "COOKIE_LOCATION=" + location + "; expires=" + new Date(86400000 + Date.now()).toUTCString() + ';'
            $('#locationModal').modal('hide')
        }
    })

})



function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


//
// let confirmButton = document.querySelector('#birthConfirmDialogBtn')
// confirmButton.addEventListener('click', function (e) {
//     e.preventDefault()
//
//     let birthYearValue = document.querySelector('#dobyear').value;
//     if (birthYearValue === '') {
//         let errMsg = document.querySelector('#confirmErrMsg')
//         errMsg.classList.remove('d-none')
//     }
//
//     // const item = {
//     //     value: 'hello', expiry: now.getTime() + 500,
//     // }
//     // localStorage.setItem('restriction', JSON.stringify(item))
//     // $('#confirmModal').modal('hide');
//     document.cookie = "username=Max Brown;
// })


window.onload = function () {
    let bannerImg = document.querySelector('.bannerImg')
    let images = ['https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80', 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1274&q=80', 'https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80', 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80'];
    bannerImg.src = images[Math.floor(Math.random() * images.length)];
}


// mapboxgl.accessToken = 'YOUR_MAPBOX_ACCESS_TOKEN';
// const map = new mapboxgl.Map({
//     container: 'map', // container ID
//     style: 'mapbox://styles/mapbox/streets-v11', // style URL
//     center: [-74.5, 40], // starting position [lng, lat]
//     zoom: 9 // starting zoom
// });


formSubmit = function (type, form, token = null) {
    let form_data = JSON.stringify(form.serializeJSON());
    let formData = JSON.parse(form_data)

    if (formData.emailorphone) {
        let data = {
            email: null, phone: null,
        }
        let emailRegex = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;
        if (emailRegex.test(formData.emailorphone)) {
            data.email = formData.emailorphone
            formData.email = data.email
        } else {
            data.phone = formData.emailorphone
            formData.phone = data.phone
        }
    }

    if (formData.dob){
        let now = (new Date()).getFullYear();
        formData.age = now - formData.dob
    }

    console.log(formData)


    let url = form.attr('action');

    $.ajax({
        type: type, url: url, data: formData, headers: {
            'Authorization': token
        }, beforeSend: function () {
            // $('#' + btn).prop('disabled', true);
            // $('#preloader').removeClass('d-none');
        }, success: function (response) {
            toastr.success(response.message)

            if (response.status === 'success' && response.data.token) {
                localStorage.setItem('accessToken', response.data.token)
                localStorage.setItem('user', JSON.stringify(response.data.user))
                $('#loginModal').modal('hide');
                location.reload()
            }


            if (response.status === 'success' && response.action === 'category-list'){
                categoryList(response)
            }
            // location.reload()
            console.log(response)
        }, error: function (xhr, resp, text) {
            console.log(xhr)
            if (xhr && xhr.responseJSON) {
                let response = xhr.responseJSON;
                if (response.status && response.status === 'validate_error') {
                    $.each(response.message, function (index, message) {
                        $('.' + message.field).addClass('is-invalid');
                        $('.' + message.field + '_label').addClass('text-danger');
                        $('.' + message.field + '_error').html(message.error);
                    });
                }
            }
        }, complete: function (xhr, status) {
            // $('#' + btn).prop('disabled', false);
            // $('#preloader').addClass();
        }
    });
}

clearError = function (input) {
    $('#' + input.id).removeClass('is-invalid');
    $('#' + input.id + '_label').removeClass('text-danger');
    $('#' + input.id + '_icon').removeClass('text-danger');
    $('#' + input.id + '_icon_border').removeClass('field-error');
    $('#' + input.id + '_error').html('');
}
$('#signOut').click(function () {
    localStorage.removeItem('accessToken')
    location.reload()
    localStorage.removeItem('user')
    // window.location.href = "{{url('login')}}";
})
// let content = document.querySelector('#signup-content')
// content.style.display = "none"
// showReg = function (){
//
//     content.style.display = "block"
//
// }


getEditData = function (url) {
    $.ajax({
        type: 'GET', url: url, success: function (response) {

            console.log(response)
            // if (response && response.status && response.status === 'success') {
            //
            //     Object.entries(response.data[0]).forEach((item) => {
            //
            //         $('#' + item[0]).val(item[1]);
            //
            //         if (item[0] === 'image') {
            //             if (dropzone) {
            //                 let mockFile = {name: 'image', size: 600,};
            //                 // let imageUrls = item[1].split('/')
            //                 let imageUrl = item[1]
            //
            //                 // imageUrls.forEach((item, i) => {
            //                 //     if (i > 0) imageUrl += '/' + item
            //                 // })
            //
            //                 // console.log('imgurl', imageUrl)
            //
            //                 dropzone.displayExistingFile(mockFile, imageUrl);
            //
            //                 $('#logo').val(imageUrl)
            //             }
            //
            //         }
            //
            //
            //         if (item[0] === 'description') {
            //             descriptionEditor.setData(item[1])
            //         } else if (item[0] === 'privacy_policy') {
            //             privacyEditor.setData(item[1])
            //         } else if (item[0] === 'cookies_policy') {
            //             cookiesEditor.setData(item[1])
            //         } else if (item[0] === 'terms_policy') {
            //             termsEditor.setData(item[1])
            //         }
            //
            //         if (item[0] === 'access' && item[1] !== null) {
            //             item[1].forEach(value => {
            //                 $(`input[name='access[]'][value='${value}']`).attr('checked', true)
            //             })
            //         }
            //
            //         if (item[0] === 'role' && item[1] === 'superAdmin') {
            //             $('#accessControl').hide()
            //         }
            //
            //         if (item[0] === 'host' || item[0] === 'api_key' || item[0] === 'copyright') {
            //             if(item[1] === '' || item[1] === null){
            //
            //                 $('#submit-button').text('Create')
            //             }else{
            //                 $('#submit-button').text('Update')
            //             }
            //         }
            //
            //
            //
            //         // if (item[0] === 'copyright') {
            //
            //         //     if(item[1] === '' || item[1] === null){
            //
            //         //         $('#submit-button').text('Create')
            //         //     }else{
            //         //         $('#submit-button').text('Update')
            //         //     }
            //
            //
            //         // }
            //
            //
            //     })
            //
            // } else {
            //     toastr.error('Something went wrong', 'Please try again after sometime.')
            // }
        }, error: function (xhr, resp, text) {
            console.log(xhr, resp)
        }
    });
}


uploader = function (event, type=null, step=null, inputHidden=null, previewImg= null) {

    event.preventDefault();
    var file = event.target.files[0];
    // console.log(event)

    let formData = new FormData()
    formData.append('file', file);
    formData.append('folder', 'video');

    var showurl = window.origin + '/api/image-uploader';
    $.ajax({
        url: showurl, type: 'POST', dataType: "json", processData: false, contentType: false, headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }, data: formData, success: function (res) {

            $('#'+inputHidden).val(res.data)

            toastr.success('File Upload successfully');
            console.log(res)
            if (type === 'img') {
                $("#showImg").removeClass('d-none').attr('src', res.data);
                $('#imgURL').val(res.data)
            } else if (type === 'video') {

                $('#video' + step).attr('src', res.data)
                $('.uploadForm').removeClass('d-none')
                // $('#privacyModal').modal('show')
            }

        }, error: function (jqXhr, ajaxOptions, thrownError) {
            console.log(jqXhr)
        }
    });
}

$(document).on('click', '.star', function (){
   let value = $('.star').attr('data-rating-value')
   let id = $('.star').attr('data-video-id')
    console.log(id)
    let formData = new FormData()
    formData.append('rating', value);

    $.ajax({
        url: window.origin + '/api/video/id'.replace('id', id),
        type: 'POST',
        dataType: "json",
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: formData,
        success: function (res) {

            console.log(res)

        }, error: function (jqXhr, ajaxOptions, thrownError) {
            console.log(jqXhr)
        }
    });
})

//file upload
// $(document).on("change", "#file-uploader", function(e) {
//     e.preventDefault();
//     var file = e.target.files[0];
//
//     let formData = new FormData()
//     formData.append('file', file);
//     formData.append('folder', 'user');
//
//     var showurl = window.origin + '/api/image-uploader';
//     $.ajax({
//         url: showurl,
//         type: 'POST',
//         dataType: "json",
//         processData: false,
//         contentType: false,
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//         },
//         data: formData,
//         success: function(res) {
//             toastr.success('File Upload successfully');
//             console.log(res)
//             $("#showImg").removeClass('d-none').attr('src', res.data);
//             $('#imgURL').val(res.data)
//             $('#video').attr('src',res.data)
//         },
//         error: function(jqXhr, ajaxOptions, thrownError) {
//             console.log(jqXhr)
//         }
//     });
// });

cloneUploadContainer = function (contentID, step) {

    $('.' + contentID).append(`
<div class="col-lg-2 col-sm-4 col-12 my-2 ">
              <div class="gallery-item">
            <video id="video${step}" src=""></video>

            <span class="iconify icon dropdown" data-bs-toggle="dropdown"
                  data-icon="fluent:add-circle-24-filled" data-width="25"
                  data-height="25"></span>

            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item border-bottom">
                    <input id="uploadImg" type="file" hidden>
                    <label for="uploadImg" class="cursor-pointer">Upload a Photo</label>
                </li>

                <li class="dropdown-item border-bottom">
                    <input id="video-uploader${step}" type="file" hidden
                           onchange="uploader(event, 'video', 'step${step}')">
                    <label for="video-uploader${step}" class="cursor-pointer">Upload a
                        Video</label>
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

        <form id="uploadForm" class="uploadForm d-none my-2">
            <input type="hidden" class="videoURL" name="video">
            <div class="form-check mb-3">
                <input class="form-check-input p-0 rounded-circle" type="radio"
                       name="privacy" id="privacy">
                <label class="form-check-label" for="privacy">
                    Make Private
                </label>
            </div>
            <button class="btn btn-primary form-control p-1 rounded">save</button>
        </form>

        </div>

    `)
}
let i = 0
loadMore = function () {
    ++i;
    cloneUploadContainer('cloneContainer', i)
}



$(document).ready(function (){
    let url = window.origin + '/api/search-user'

    let location = getCookie('COOKIE_LOCATION')
    $('.getLocation').val(location)

    let formData = new FormData()
    formData.append('address', location);

    $.ajax({
        type: "post",
        url: url,
        data:formData,
        dataType: "json",
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            // console.log(response)
            userList(response)
        }, error: function (xhr, resp, text) {
            console.log(xhr)
        }
    });
})

getShowData = function (url){
    $.ajax({
        type: 'GET',
        url: url,
        success: function (response) {
            categoryList(response)
        },
        error:function (err){
            console.log(err)
        }
    })
}

categoryList = function (res){
    res.data.forEach(item=>{
        $('#categoryList').append(`
            <li class="col-3">
                            <div class="card position-relative">
                                <span class="iconify editCategory" data-bs-target="#editCategoryModal" data-bs-toggle="modal" data-id="${item.id}" data-icon="bxs:edit" data-width="20" data-height="20"></span>
                                <img src="https://th.bing.com/th/id/OIP.FcUYoInKYogVky8OJn08lgHaLH?pid=ImgDet&rs=1" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h2>52</h2>
                                    <span>${item.name}</span>
                                </div>
                            </div>

                        </li>
        `)
    })
}

$(document).on('click', '.editCategory', function (){
    let id = $('.editCategory').attr('data-id')
    console.log(id)
})

userList = function (res){
    res.data.forEach((item, key)=>{
        console.log('imte',item)
        $('#homeSearchListContainer').append(`
        <li class="list-item border-bottom py-2 restrictedList ">
                    <div class="row">
                        <div class="col-lg-1 col-sm-1 col-3">
                            <img class="profile__image"
                                 src="https://images.unsplash.com/photo-1513689125086-6c432170e843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                                 alt="">
                        </div>
                        <div class="col-lg-8 col-sm-6 col-6">
                            <div class="d-flex align-items-center mb-3">
                        <span class="iconify me-3 text-primary" data-icon="entypo:location" data-width="30"
                              data-height="30"></span>
                                <span>${item.address}</span>
                                <span class="mx-3">|</span>
                                <span class="iconify text-primary" data-icon="clarity:new-solid" data-width="30"
                                      data-height="30"></span>
                            </div>
                            <div class="d-flex align-items-center">
                        <span class="iconify text-success me-3" data-icon="ci:dot-03-m" data-width="30"
                              data-height="30"></span>
                                <span class="me-3">${item.username}</span>
                                <span class="me-3">${item.age}y.o</span>
                                <span>host/visit</span>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-3 col-3">
                            <ul class="extra-list">
                                <li class="extra-list-item">
                                    <span
                                        data-event="message"
                                        data-userid='${item.id}'
                                        class="iconify user-message-icon cursor-pointer extra-list-link authAction"
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


        `)
    })
}


$(document).on('click','.user-message-icon', function (){
    $('.messenger').removeClass('d-none')

    let userid = $('.user-message-icon').attr('data-userid')
    console.log(userid)

    $('.messenger-user-id').val(userid);
})

const message_form = document.getElementById('messageForm');
let message_userid = document.getElementById('messenger-user-id');
let message_input = document.getElementById('message_input');
let message_el = document.querySelectorAll('#messages');

// message_form.addEventListener('submit', function (e){
//     e.preventDefault();
//
//     const options= {
//         method:'post',
//         url: '/send-message',
//         data: {
//             userid: message_userid.value,
//             message: message_input.value,
//         },
//         success: function (res){
//             console.log(res)
//         }
//     }
//
//     // axios(options);
// })

// window.Echo.channel('chat').listen('.message', (e)=>{
//         console.log(e.username)
//     })
