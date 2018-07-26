<template>
    <div>
        <b><i class="fa fa-image"></i> Choose from existing images :</b>
        <button class="btn btn-primary" @click.prevent="getImageList()">Select Image</button>
        <div class="imgList">
            <div style="position: absolute;top:0;">
                <i class="fa fa-image text-success"> Click on image to choose</i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class=" fa fa-times btn btn-danger btn-sm" v-on:click="closeImg()"></i>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-center choose-image" v-for="img in imgList">
                    <img :src="'/images/upload/'+img" alt="image" v-on:click="imageSelect(img)">
                </div>
            </div>
        </div>
        <input type="text" name="select_image" v-model="selectImage" style="display:none;">
        {{selectImage}}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                imgList: '',
                selectImage: ''
            }
        },
        methods: {
            getImageList() {
                axios.get(server._url + '/api/imagelist').then(response => {
                    this.imgList = response.data;
                    $('.imgList').show();
                });
            },
            closeImg() {
                $('.imgList').hide();
            },
            imageSelect(value) {
                this.selectImage = value;
                this.closeImg();
            }
        }
    }
</script>

<style>
    .choose-image img {
        height: 100px;
        width: 100px;
        padding: 5px;
        box-shadow: 1px 1px 10px deepskyblue;
        z-index: 5;
    }

    .choose-image img:hover {
        height: 200px;
        width: 200px;
        z-index: 10;
    }

    .imgList {
        overflow-y: scroll;
        padding: 2px;
        box-shadow: 1px 1px 10px deepskyblue;
        z-index: 20;
        display: none;
        position: absolute;
        background: white;
    }
</style>