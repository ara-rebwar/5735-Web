<div id="fileUpload"
     style="display: none;justify-content: center;align-items: center;width: 100%;height: 100%;position:fixed;top: 0;left: 0;z-index: 3;background: rgba(255,255,255,0.8);">
    <div class="card"
         style="width:50%;height: 80%;background: lightgrey;">
        <div class="card-header "
             style="display: flex;justify-content: center;align-items: center;">
            <h1 class="card-title ">Upload File</h1>
            <span class="btn btn-dark" id="closeBtn"
                  style="position:absolute;right:10px;">X</span>
        </div>
        <div class="card-header">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input"
                           id="exampleInputFile1"
                           name="marketIconImage">
                    <label class="custom-file-label"
                           for="exampleInputFile1">Select Market Icon
                        Image</label>
                </div>
            </div>
            <label style="padding:0px;margin: 0px;font-size: 12px;"
                   class="text-danger">@error('marketIconImage'){{$message}}@enderror</label>
        </div>
        <div style="height: 100%;overflow-y: scroll;">

            <div class="card-body" style="">
                <div class="headline alert bg-gradient-dark">Icon
                    Images
                </div>
                <div class="row">
                    @foreach($marketImages as $image)
                        <div class="col-md-2 imageContainer">
                            <img src="{{$image->url}}"
                                 class="rounded my-2 chooseImage"
                                 style="width: 100%;transition: 0.5s ease;"
                                 id="{{$image->id}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer">

            <button type="button" class="btn btn-dark" id="saveBtn">Save
                <i class="fa fa-save"></i></button>
        </div>
    </div>
</div>
