@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="col-mid-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Slide Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('updateSlide')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="slideID" value="{{$data['slide'][0]->id}}">
                            <input type="hidden" name="mediaID" value="{{$data['slide'][0]->media}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Market</label>
                                    <select class="form-control" name="slideMarket" id="slideMarket">
                                        <option disabled >None</option>
                                        <?php
                                        $a=0;
                                        while ($a< count($data['market'])){
                                            if ($data['slide'][0]->slideMarket== $data['market'][$a]->id){ ?>
                                        <option value="<?php echo $data['market'][$a]->id; ?>" selected><?php echo $data['market'][$a]->name; ?></option>
                                   <?php     }else{?>
                                        <option value="<?php echo $data['market'][$a]->id; ?>"><?php echo $data['market'][$a]->name; ?></option>
                                    <?php    }
                                            ?>
                                        <?php
                                        $a++;
                                        }
                                        ?>
                                    </select>
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideMarket'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select Product</label>
                                    <select class="form-control" name="slideProduct" id="slideProduct">
                                        <option disabled selected >None</option>
                                        @foreach($data['marketProduct'] as $product)
                                            @if($product->id == $slideInfo[0]->product)
                                                <option value="{{$product->id}}" selected>{{$product->name}}</option>
                                            @else
                                                <option value="{{$product->id}}" >{{$product->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideProduct'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group">
                                    <label> Description</label>
                                    <input type="text"  class="form-control" placeholder="Write Description" name="slideDescription" value="{{$data['slide'][0]->text}}">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideDescription'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group">
                                    <label> Description in Kurdish</label>
                                    <input type="text"  class="form-control" placeholder="Write Description" name="slideDescriptionKurdish" value="{{$data['slide'][0]->description_kurdish}}">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideDescriptionKurdish'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group">
                                    <label> Order Number</label>
                                    <input type="text"  class="form-control" placeholder="Enter Order Number" name="slideOrderNumber" value="{{$data['slide'][0]->order}}">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideOrderNumber'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group">
                                    <label> Image </label>
                                    <div class="custom-file">
                                        <button class="btn btn-success" type="button"  id="slideImage">Select Slide Image <i class="fa fa-paperclip mx-2"></i> </button>
                                    </div>
{{--                                    ////////////--}}
                                    <div id="fileUpload" style="display: none;justify-content: center;align-items: center;width: 100%;height: 100%;position:fixed;top: 0;left: 0;z-index: 3;background: rgba(255,255,255,0.8);">
                                        <div class="card" style="width:50%;height: 80%;background:#f8f9fa;">
                                            <div class="card-header " style="display: flex;justify-content: center;align-items: center;">
                                                <h1 class="card-title ">Upload File</h1>
                                                <button type="button" class="close" style="position:absolute;right:10px;" id="closeBtn" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="card-header fileInput">
                                                <div class="input-group ">
                                                    <div class="custom-file ">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="slideImage">
                                                        <input type="hidden" id="slidePriority" value="0">
                                                        <label class="custom-file-label" for="exampleInputFile1">Select Slide Image</label>
                                                    </div>
                                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideImage'){{$message}}@enderror</label>
                                                </div>
                                            </div>
                                            <div style="height: 100%;overflow-y: scroll;">
                                                <div class="card-body" style="">
                                                    <div class="headline alert bg-gradient-primary " >Icon Images</div>
                                                    <div class="row " style="display: flex;justify-content: center;">
                                                        @foreach($marketImages as $image)
                                                            <div class="col-md-2 imageContainer img-thumbnail rounded m-2">
                                                                <img src="{{$image->url}}" class="rounded my-2 chooseImage" style="width: 100%;transition: 0.5s ease;" id="{{$image->id}}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <input type="hidden" name="chosenImageSlide" id="chosenImageSlide">
                                                <button type="button" class="btn btn-primary" id="saveBtn">Save
                                                    <i class="fa fa-save mx-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
{{--                                    ////////////--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{$data['slide'][0]->url}}"  id="slide_Image_src" class="img-thumbnail rounded">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <script>
        $(document).ready(function(e){
            $('#slideMarket').on('change',function (e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id=$("#slideMarket").val();
                $.ajax({
                    url:"/slides/{id}",
                    type:"GET",
                    data:{data:id},
                    success:function(data){
                        var data = JSON.parse(data);
                        if (data != "") {
                            for (var a = 0; a < data.length; a++) {
                                $('#slideProduct').append("<option value=" + data[a].id + ">" + data[a].name + "</option>");
                            }
                        }else{
                            $('#slideProduct').empty();
                            $('#slideProduct').append("<option disabled selected > None</option>");
                        }
                    }
                });
            });
        });

        $('#closeBtn').on('click', function () {
            $('#fileUpload').css('display', 'none');
            $('.chooseImage').css('border', 'none');
        })

        $('#saveBtn').on('click', function () {
            $('#fileUpload').css('display', 'none');
            $('.chooseImage').css('border', 'none');
        })

        var buttons = document.getElementsByClassName("fileButton");
        document.getElementById('slideImage').addEventListener("click", function () {
            ara('chosenImageSlide','slide_Image_src','slidePriority');
        });
        $('#slideImage').on('change',function(){
            readURL(this,'slide_Image_src');
            $('#slidePriority').attr('value','0');
            alertify.notify('Image Selected ...', 'success', 5, function(){  console.log('dismissed'); });
            $('#fileUpload').css('display','none');
        })
        function  ara(name,imgSrc,priority) {
            var isFirst = true;
            document.getElementById('fileUpload').style.display = "flex";
            document.querySelectorAll('.chooseImage').forEach(item => {
                item.addEventListener("click", event => {
                    if (!isFirst) {
                        return;
                    }
                    document.getElementById(priority).setAttribute('value','1');
                    document.getElementById('fileUpload').style.display="none";
                    document.getElementById(name).setAttribute('value', item.getAttribute('src'));
                    document.getElementById(imgSrc).setAttribute('src',item.getAttribute('src'));
                    alertify.notify('Image Selected ...', 'success', 5, function(){  console.log('dismissed'); });
                    isFirst = false;
                })
            });
        }
        function readURL(input,image) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#"+image).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
