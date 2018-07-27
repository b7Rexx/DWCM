<template>
    <div>
        <b><i class="fa fa-image"></i> Choose from existing images :</b>
        <button class="btn btn-primary" @click.prevent="getImageList()">Select Image</button>
        <div class="imgList">
            <div class="p-2">
                <i class="fa fa-image text-success"> Click on image to choose</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class=" fa fa-times text-danger " v-on:click="closeImg()"></i>
            </div>
            <div class="row">
                <div class="col-sm-6 text-center choose-image" v-for="img in imgList">
                    <img :src="'/images/upload/'+img" alt="image" v-on:click="imageSelect(img)">
                </div>
            </div>
        </div>
        <input type="text" name="select_image" v-model="selectImage" style="display:none;">
        <div v-if="selectImage">
            <img :src="'/images/upload/'+selectImage" alt="" style="height:80px;width:80px">
            <i class="fa fa-times fa-2x text-danger" title="remove image" v-on:click="removeImg()"></i>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                imgList: '',
                selectImage: false
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
            },
            removeImg() {
                this.selectImage = false;
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
    }

    .imgList {
        overflow-y: scroll;
        padding: 2px;
        box-shadow: 1px 1px 10px deepskyblue;
        z-index: 20;
        width: 260px;
        display: none;
        position: absolute;
        background: white;
    }
</style>