<b><i class="fa fa-sticky-note"></i> Name :</b>
<input type="text" name="name" class="form-control" placeholder="Name" required>
<br>
<b><i class="fa fa-newspaper-o"></i> Quote/Note : </b>
<input type="text" name="quote" class="form-control" placeholder='important note'>
<br>
<b><i class="fa fa-address-book"></i> Detail :</b>
<input type="text" name="detail" class="form-control">
<br>
<div class="row">
    <div class="col-sm-7">
        <b><i class="fa fa-image"></i> Upload Image :</b>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="col-sm-1">
        <i class="text-warning lead text-center">OR </i>
    </div>
    <div class="col-sm-4">
        <div id="image-vue">
            <image-component></image-component>
        </div>
    </div>
</div>

<br>
<b><i class="fa fa-music"></i> Upload Audio :</b>
<input type="file" name="audio" class="form-control">
<br>
<b><i class="fa fa-video-camera"></i> Enter Video Url :</b>
<input type="text" name="video" class="form-control">
