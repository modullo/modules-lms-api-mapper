@extends('layouts.themes.tabler.tabler')

@section('head_css')
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue.css" />
    <link href="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3/dist/vue-loading.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                        <div class="card-header justify-content-between"><b>Users Map</b> <a class="btn btn-sm btn-primary" @click.prevent="" v-b-modal.user-map-modal>Edit</a></div>
                        <div class="card-body">
                            <p v-for="(map,mapKey) in api_maps.users" v-if="map.should_map"><b>@{{map.label}}:</b> Internal key <i>@{{ mapKey }}</i> mapped to external key <i>@{{ api_maps_data.users[mapKey] }}</i> </p>
                            <b-modal id="user-map-modal" size="lg" scrollable title="Edit User Map" no-close-on-backdrop hide-footer>
                                <user-api-mapper-form :users-map="api_maps.users" :users-map-data="api_maps_data.users" ref="editUserMap" @update-user-map="updateUserMap"></user-api-mapper-form>
                            </b-modal>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header justify-content-between"><b>Programs Map</b> <a class="btn btn-sm btn-primary" @click.prevent="" v-b-modal.program-map-modal>Edit</a></div>
                        <div class="card-body">
                            <p v-for="(map,mapKey) in api_maps.programs" v-if="map.should_map"><b>@{{map.label}}:</b> Internal key <i>@{{ mapKey }}</i> mapped to external key <i>@{{ api_maps_data.programs[mapKey] }}</i> </p>
                            <b-modal id="program-map-modal" size="lg" scrollable title="Edit Program Map" no-close-on-backdrop hide-footer>
                                <program-api-mapper-form :programs-map="api_maps.programs" :programs-map-data="api_maps_data.programs" ref="editProgramMap" @update-program-map="updateProgramMap"></program-api-mapper-form>
                            </b-modal>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header justify-content-between"><b>Courses Map</b> <a class="btn btn-sm btn-primary" @click.prevent="" v-b-modal.course-map-modal>Edit</a></div>
                        <div class="card-body">
                            <p v-for="(map,mapKey) in api_maps.courses" v-if="map.should_map"><b>@{{map.label}}:</b> Internal key <i>@{{ mapKey }}</i> mapped to external key <i>@{{ api_maps_data.courses[mapKey] }}</i> </p>
                            <b-modal id="course-map-modal" size="lg" scrollable title="Edit Course Map" no-close-on-backdrop hide-footer>
                                <course-api-mapper-form :courses-map="api_maps.courses" :courses-map-data="api_maps_data.courses" ref="editCourseMap" @update-course-map="updateCourseMap"></course-api-mapper-form>
                            </b-modal>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header justify-content-between"><b>Modules Map</b> <a class="btn btn-sm btn-primary" @click.prevent="" v-b-modal.module-map-modal>Edit</a></div>
                        <div class="card-body">
                            <p v-for="(map,mapKey) in api_maps.modules" v-if="map.should_map"><b>@{{map.label}}:</b> Internal key <i>@{{ mapKey }}</i> mapped to external key <i>@{{ api_maps_data.modules[mapKey] }}</i> </p>
                            <b-modal id="module-map-modal" size="lg" scrollable title="Edit Module Map" no-close-on-backdrop hide-footer>
                                <module-api-mapper-form :modules-map="api_maps.modules" :modules-map-data="api_maps_data.modules" ref="editModuleMap" @update-module-map="updateModuleMap"></module-api-mapper-form>
                            </b-modal>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header justify-content-between"><b>Lessons Map</b> <a class="btn btn-sm btn-primary" @click.prevent="" v-b-modal.lesson-map-modal>Edit</a></div>
                        <div class="card-body">
                            <p v-for="(map,mapKey) in api_maps.lessons" v-if="map.should_map"><b>@{{map.label}}:</b> Internal key <i>@{{ mapKey }}</i> mapped to external key <i>@{{ api_maps_data.lessons[mapKey] }}</i> </p>
                            <b-modal id="lesson-map-modal" size="lg" scrollable title="Edit Lesson Map" no-close-on-backdrop hide-footer>
                                <lesson-api-mapper-form :lessons-map="api_maps.lessons" :lessons-map-data="api_maps_data.lessons" ref="editLessonMap" @update-lesson-map="updateLessonMap"></lesson-api-mapper-form>
                            </b-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('body_js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vee-validate@<3.0.0/dist/vee-validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('vendor/breadcrumbs/BreadCrumbs.js') }}"></script>
    <script src="{{ asset('vendor/mapper/components/UserApiMapperForm.js') }}"></script>
    <script src="{{ asset('vendor/mapper/components/ProgramApiMapperForm.js') }}"></script>
    <script src="{{ asset('vendor/mapper/components/CourseApiMapperForm.js') }}"></script>
    <script src="{{ asset('vendor/mapper/components/ModuleApiMapperForm.js') }}"></script>
    <script src="{{ asset('vendor/mapper/components/LessonApiMapperForm.js') }}"></script>
    <script>
        Vue.use(VueLoading);
        Vue.component('loading', VueLoading)
        Vue.use(VeeValidate);
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script>
        "use strict";

        new Vue({
            el: "#mapper",

            data: {
                user: [],
                organization: [],
                update_type: '',
                api_maps: {!! json_encode($maps) !!},
                api_maps_data: {!! json_encode($mapsData) !!},
                {{--user_form_url: '{{route('user-mapper.store')}}'--}}
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
                updateUserMap(payload){
                    this.api_maps_data.users = payload
                },
                updateProgramMap(payload){
                    this.api_maps_data.programs = payload
                },
                updateCourseMap(payload){
                    this.api_maps_data.courses = payload
                },
                updateModuleMap(payload){
                    this.api_maps_data.modules = payload
                },
                updateLessonMap(payload){
                    this.api_maps_data.lessons = payload
                },
            },
            mounted: function() {
                // console.log(this.schedule_items)
                //console.log(this.assets)
                //console.log(this.quizzes)
            }
        });

    </script>
@endsection
