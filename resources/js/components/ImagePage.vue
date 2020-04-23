<template>
    <div class="col-12">
        <div class>
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Gallery</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <button type="button" class="btn btn-primary" @click="newModal()" style="border:0"><i class="far fa-images" style="font-size:23px;padding: 0 10px"></i></button>
                                <div
                                    class="modal fade"
                                    id="exampleModalLong"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLongTitle"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle" >
                                                    New image
                                                    <br />
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent="upl()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="custom-file">
                                                        <input
                                                            type="file"
                                                            name="path"
                                                            class="custom-file-input"
                                                            id="customFileLangHTML"
                                                            @change="onInputChange"
                                                            multiple
                                                        />
                                                        <label class="custom-file-label" for="customFileLangHTML"  data-browse="image file">Choose file</label>
                                                    </div>
                                                    <div class="form-group" style="margin-top:10px">
                                                        <label for="" >Category</label>
                                                        <select class="custom-select" id="inputGroupSelect02" name="category" v-model="form.category">
                                                            <option selected value="all">None</option>
                                                            <option value="tube">Tube</option>
                                                            <option value="microscope">Microscope</option>
                                                            <option value="prelevement">Prelevement</option>
                                                            <option value="resulta">Resulta</option>
                                                            <option value="docteur">Docteur</option>
                                                            <option value="laboratoire">Laboratoire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button  type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
<!--                    <div class="container col-md-12" >-->
<!--                        <div v-for="slider in sliders" :key="slider.id" class="img rounded" style="text-align: center; " :style="{'background-image' : 'url(/images/' +slider.path +')'}">-->
<!--                            <div class="img" style="background: rgba(0,0,0,0.3)">-->
<!--                                <div style="margin-top:90px;">-->
<!--                                    <a data-fancybox="gallery" :href="'/images/' + slider.path"  class="zoom"><i class="fas fa-search" style="opacity : 1; z-index:3"></i></a>-->
<!--                                </div>-->
<!--                                <div style="margin-top: 64px ; margin-right:5px; " class="float-right">-->
<!--                                    <a  :href="'/images/' + slider.path" download class="zoom">-->
<!--                                        <i class="fas fa-download align-bottom " style="opacity : 1; z-index:3"></i>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center mb-5">
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="all">All</button>
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="tube">Tube</button>
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="microscope">Microscope</button>
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="prelevement">Prelevement</button>
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="resulta">Resulta</button>
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="docteur">Docteur</button>
                            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="laboratoire">Laboratoire</button>

                        </div>
                    </div>
                    <div class="container" id="gallery">
                        <div v-for="slider in sliders" :key="slider.id" class="img pics rounded all " :class="slider.category" style="text-align: center; " :style="{'background-image' : 'url(/images/' +slider.path +')'}">
                            <div class="img all" style="background: rgba(0,0,0,0.3)" :class="slider.category">
                                <div style="margin-top:90px;"  class="all" :class="slider.category">
                                    <a data-fancybox="gallery" :href="'/images/' + slider.path"  class="zoom"><i class="fas fa-search" style="opacity : 1; z-index:3"></i></a>
                                </div>
                                <div style="margin-top: 64px ; margin-right:5px; " class="float-right all" :class="slider.category">
                                    <a  :href="'/images/' + slider.path" download class="zoom">
                                        <i class="fas fa-download align-bottom " style="opacity : 1; z-index:3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        created() {
            this.loadSliders();
            // setInterval(() => this.loadSliders(), 1500);
        },
        data() {
            return {
                ip : '/image/',
                editmode: false,
                sliders: {},
                form: new Form({
                    id: "",
                    path: "",
                    folder_id :"",
                    category : ""
                })
            };
        },
        methods: {
            newModal() {
                this.editmode = false;
                $("#exampleModalLong").modal("show");
            },
            upl() {
                this.form.post("/createImage")
                    .then((data) => {
                        $("#exampleModalLong").modal("hide");
                        this.loadSliders();
                    })
                    .catch(() =>
                    {
                            $("#exampleModalLong").modal("hide")
                    });
            },
            onInputChange(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = file => {
                    this.form.path = reader.result;
                };
                reader.readAsDataURL(file);
            },
            loadSliders() {
                axios.get("/listImage").then(({ data }) => (this.sliders = data));
            },
        }
    };
</script>
<style>




    .gallery {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        -webkit-column-width: 33%;
        -moz-column-width: 33%;
        column-width: 33%; }
    .gallery .pics {
        -webkit-transition: all 350ms ease;
        transition: all 350ms ease; }
    .gallery .animation {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1); }

    @media (max-width: 450px) {
        .gallery {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
            -webkit-column-width: 100%;
            -moz-column-width: 100%;
            column-width: 100%;
        }
    }

    @media (max-width: 400px) {
        .btn.filter {
            padding-left: 1.1rem;
            padding-right: 1.1rem;
        }
    }

    .img {
        float:  left!important;
        width:  200px!important;
        height: 200px!important;
        background-size: cover!important;
        margin-right: 10px!important;
        margin-bottom: 10px!important;
    }
    .img2 {
        float:  left!important;
        width:  200px!important;
        height: 200px!important;
        background-size: cover!important;
        margin-right: 10px!important;
        background-color: Black !important;
        opacity: 0.2!important;
    }
    .zoom {
        font-size: 20px!important;
        color: #ffffff!important;
    }

    .zoom:hover
    {
        font-size:  20px!important;
        color : #3490dc!important;
    }
</style>
