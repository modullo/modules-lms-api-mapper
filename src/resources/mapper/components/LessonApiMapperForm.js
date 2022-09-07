Vue.component("lesson-api-mapper-form", {
    props: {
        lessonsMap: {
            default: () => [],
        },
        lessonsMapData: {
            default: () => [],
        },
    },
    template: `
        <div class="container">
            <form class="form" @submit.prevent="validateBeforeSubmit">
                <div class="form-row">
                    <div class="form-group col-lg-6" v-for="(map,mapKey) in lessonsMap" v-if="map.visible">
                        <label for="name">{{map.label}}</label>
                        <p class="control has-icon has-icon-right">
                            <input :name="mapKey" class="form-control" v-model="form[mapKey]" v-validate="'required'" :class="{'input': true }" type="text" :placeholder="map.placeholder">
                        </p>
                    </div>
                </div>
                <div class=" submit-btn d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-outline-secondary">Update</button>
                </div>
            </form>
        </div>
      `,
    data() {
        return {
            form: this.lessonsMapData,
        };
    },
    mounted() {
        console.log(this.lessonsMapData)
    },
    watch: {
        form: function(newVal, oldVal) {
            console.log(newVal)
        }
    },
    methods: {
        validateBeforeSubmit(ev) {
            console.log(this.form)
            let loader = Vue.$loading.show()
            //updae-type below must be one of the model keys in the mapper config file
            axios.post(`/tenant/api-mapper?update-type=lesson`, this.form).then(res => {
                // ev.target.reset()
                console.log(res.data)
                this.$emit('update-lesson-map',this.form)
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
        },
    },
    computed: {},
    destroyed: function () {
    },
});
  