@extends('layouts.themes.tabler.tabler')

@section('head_css')
    <style>
        .breadcrumb-item + .breadcrumb-item::before {
            content: ">>";
        }
        .card-course {
        position: relative;
        /* width: 319px; */
        /* display: flex; */
        /* flex-direction: column; */
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        box-shadow: rgb(31 31 31 / 12%) 0px 1px 6px, rgb(31 31 31 / 12%) 0px 1px 4px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* box-shadow: 0 2px 2px rga(0, 0, 0, 0.25); */
        border: none;
        border-radius: 0.35rem;
        border-radius: 8px;
        transition: transform .5s;
        cursor: pointer;
        }
        .card-course:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }
        .primary-backgroundColor {
            background-color: #343a40 !important;
            color: white;
        }
    </style>
@endsection


@section('body_content_main')
    @include('modules-lms-base::navigation',['type' => 'tenant'])
    <div id="mapper">
        <breadcrumbs 
            :items="[
                {url: '/tenant/dashboard', title: 'Home', active: false},
                {url: '', title: 'Mapper', active: true},
            ]">
        </breadcrumbs>
        <div class="container mt-1">
            <div class="row">
                <div class="col-12 py-4">
                    <h2 class="mb-2">API Mapper</h2>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Webhook Details</div>
                            <p>Update your learning platform using external sources</p>
                            <form class="form" @submit.prevent="validateBeforeSubmit">
                                <div class="flex items-center justify-center h-16 w-16 mx-auto bg-white border-2 border-yellow rounded-full">
                                    <i class="ri-user-line text-h3 ri-fw text-black"></i>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_users">Users:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_users" value="{{config('app.url')}}/webhook/users" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_courses">Courses:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_courses" value="{{config('app.url')}}/webhook/courses" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_modules">Modules:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_modules" value="{{config('app.url')}}/webhook/modules" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_lessons">Lessons:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_lessons" value="{{config('app.url')}}/webhook/lessons" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">External Credentials</div>
                            <p>Update your learning platform using external sources</p>
                            <form class="form" @submit.prevent="validateBeforeSubmit">
                                <div class="flex items-center justify-center h-16 w-16 mx-auto bg-white border-2 border-yellow rounded-full">
                                    <i class="ri-user-line text-h3 ri-fw text-black"></i>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_users">Users:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_users" value="{{config('app.url')}}/webhook/users" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_courses">Courses:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_courses" value="{{config('app.url')}}/webhook/courses" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_modules">Modules:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_modules" value="{{config('app.url')}}/webhook/modules" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-auto col-form-label font-weight-bold" for="webhook_lessons">Lessons:</label>
                                    <div class="form-group col-md-8 m-0">
                                        <input type="text" class="form-control-plaintext" id="webhook_lessons" value="{{config('app.url')}}/webhook/lessons" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header justify-content-between"><b>Users Map</b> <a class="btn btn-sm btn-primary" href="{{route('user-mapper.edit',1)}}">Edit</a></div>
                        <div class="card-body">
                            <p>Update your learning platform using external sources</p>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('body_js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="{{ asset('vendor/breadcrumbs/BreadCrumbs.js') }}"></script>
    <script>
        "use strict";

        new Vue({
            el: "#mapper",

            data: {
                user: [],
                organization: [],
                update_type: '',
            },
            methods: {
                accessImage(e) {
                    this.organization.logo = e.target.files[0]
                },
                validateBeforeSubmit(ev) {
                    console.log(ev)
                    this.update_type = ev.target.update_type.value
                    this.organization.update_type = this.update_type
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            let loader = Vue.$loading.show()
                            this.uploadImage()
                                .then(() => {
                                    axios.put(`profile-settings/${this.user.uuid}`, this[this.update_type]).then(res => {
                                        loader.hide();
                                        toastr["success"](res.data.message)
                                    }).catch(e => {
                                        loader.hide();
                                        const errors = e.response.data.error
                                        if(e.response.data.error){
                                            toastr["error"](e.response.data.error)
                                        }
                                        else if(e.response.data.validation_error){
                                            Object.entries(e.response.data.validation_error).forEach(
                                                ([, value]) => {
                                                    toastr["error"](value)
                                                },
                                            )
                                        }
                                    })
                                })
                        }
                    });
                },
                async uploadImage() {
                    if (typeof this.organization.logo.name !== 'undefined') {
                        const formData = new FormData();
                        formData.append("asset", this.organization.logo, this.organization.logo.name);
                        await axios.post('/tenant/assets/custom/upload', formData)
                            .then( res => {
                                this.organization.logo = res.data.file_url
                            })
                            .catch(e => {
                                console.log(e.response.data.error)
                            })
                    }
                },
                addScheduleItem(schedule){
                    console.log(schedule)
                    this.schedule_items.push(schedule)
                }
            },
            mounted: function() {
                // console.log(this.schedule_items)
                //console.log(this.assets)
                //console.log(this.quizzes)
            }
        });

    </script>
@endsection
