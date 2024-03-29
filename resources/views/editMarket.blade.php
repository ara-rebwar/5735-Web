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
    @if(session('updateMarketMsg'))
        <div class="alert alert-success" style="margin:1% 1.4%;">
            {{session('updateMarketMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    @if($data['marketInfo'] == null)
                        <div class="alert alert-warning text-center">There is something wrong !!!</div>
                    @else
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Market Form</h3>
                        </div>
                        <form role="form" action="{{route('updateMarketID',$data['marketInfo'][0]->marketId)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="marketId" value="{{$data['marketInfo'][0]->marketId}}">
                            <input type="hidden" name="mediaId" value="{{$data['marketInfo'][0]->imageId}}">
                            <input type="hidden" name="IconImageId"  value="{{$data['marketInfo'][0]->icon}}">

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4" >
                                        <label class="form-label">Market Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Market Name" name="marketName" value="{{$data['marketInfo'][0]->marketName}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketName'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label class="form-label">Market Address</label>
                                        <select name="marketAddress" class="form-control">
                                            <option disabled selected>Select Address</option>
                                            <?php $addressCount=0;
                                            while ($addressCount <count($data['address'])){
                                            if ($data['marketInfo'][0]->address == $data['address'][$addressCount]->id){?>
                                            <option value="{{$data['address'][$addressCount]->id}}" selected>{{$data['address'][$addressCount]->place1}}</option>
                                            <?php     }else{?>
                                            <option value="{{$data['address'][$addressCount]->id}}">{{$data['address'][$addressCount]->place1}}</option>
                                            <?php  }?>
                                            <?php    $addressCount++; }?>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketAddress'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label class="form-label">Phone 1</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" name="marketMobile1" value="{{$data['marketInfo'][0]->mobile1}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketMobile1'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Phone 2 </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Phone Second Number" name="marketPhone2" value="{{$data['marketInfo'][0]->mobile2}}">
                                        <label style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketPhone2'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label">is Market closed ?</label>
                                        <select class="form-control" name="marketClosed">
                                            <option disabled selected>Is Closed?</option>
                                            <?php
                                            if ($data['marketInfo'][0]->closed  == 1){  ?>
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                            <?php    }else{  ?>
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                            <?php    }
                                            ?>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketClosed'){{$message}}@enderror</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <select class="mul-select form-control" multiple="multiple" style="width: 100%" name="category[]" id="category_selection">
                                                <?php
                                                    $categories =array();
                                                    foreach($data['categories'] as $cats){
                                                        array_push($categories,$cats->category_id);
                                                    }
                                                    foreach ($data['category'] as $category){?>
                                                       <option value="<?php echo $category->id ;?>" <?=
                                                           in_array($category->id,$categories) ? "selected" :""
                                                           ?>>{{$category->category_name}}</option>
                                                 <?php   }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Market Name Kurdish</label>
                                        <input type="text" class="form-control" placeholder="Write Market Name In Kurdish" name="marketNameKurdish" value="{{$data['marketInfo'][0]->name_kurdish}}">
                                        <label style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketNameKurdish'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Market Name Arabic</label>
                                        <input type="text" class="form-control" placeholder="Write Market Name In Arabic" name="marketNameArabic" value="{{$data['marketInfo'][0]->name_arabic}}">
                                        <label style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketNameArabic'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group  col-md-4" >
                                        <label class="form-label">Market Type</label>
                                        <select name="type" class="form-control" id="type_Selection" >
                                            <option disabled selected >Select Type</option>
                                            <?php
                                            $typeCount = 0;
                                            while ($typeCount<count($data['type'])){
                                                if ($data['marketInfo'][0]->type == $data['type'][$typeCount]->id){ ?>
                                            <option value="{{$data['type'][$typeCount]->id}}" data-foo="{{$data['type'][$typeCount]->has_product}}" selected>{{$data['type'][$typeCount]->types}}</option>
                                        <?php }else{ ?>
                                            <option value="{{$data['type'][$typeCount]->id}}" data-foo="{{$data['type'][$typeCount]->has_product}}">{{$data['type'][$typeCount]->types}}</option>
                                        <?php }?>
                                            <?php $typeCount++;}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Has product ?</label>
                                        <select name="has_product" class="form-control">
                                            <option disabled selected>Has Product</option>
                                            <?php
                                            if ($data['marketInfo'][0]->has_product == 1){ ?>
                                            <option value="0">No</option>
                                            <option value="1" selected>Yes</option>
                                            <?php   }else{ ?>
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                            <?php     }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row " style="display: flex;justify-content: start;">
                                    <div class="form-group col-md-2">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <button type="button" class="btn bg-gradient-success fileButton " style="color: white;" id="marketImage">Market Image<i class="fa fa-paperclip mx-2"></i></button>
                                            </div>
                                        </div>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketURL'){{$message}}@enderror</label>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="custom-file">

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
                                                                    <input type="file" class="custom-file-input " id="marketURL"  name="marketURL">
                                                                    <input type="hidden" id="marketPriority" value="0">
                                                                    <label class="custom-file-label" for="exampleInputFile1">Select Market  Image</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-header fileInput">
                                                            <div class="input-group ">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input " id="marketIconImage" name="marketIconImage">
                                                                    <input type="hidden" id="iconPriority" value="0">
                                                                    <label class="custom-file-label" for="exampleInputFile1">Select Market Icon Image</label>
                                                                </div>
                                                            </div>
                                                            <label style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketIconImage'){{$message}}@enderror</label>
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
                                                            <button type="button" class="btn btn-primary" id="saveBtn">Save
                                                                <i class="fa fa-save mx-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="chosenImageMarket" id="chosenImageMarket">
                                                <input type="hidden" name="chosenImageIcon" id="chosenImageicon">
                                                <button type="button" class="btn bg-gradient-success fileButton" style="color: white;" id="iconImage">Icon Image<i class="fa fa-paperclip mx-2"></i></button>
                                            </div>
                                        </div>
                                        <label style="padding:0px;margin: 0px;font-size: 12px;"
                                               class="text-danger">@error('marketIconImage'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src=""  id="market_Image_src" class="img-thumbnail rounded">
                                    </div>
                                    <div class="col-md-2">
                                        <img src=""  id="icon_image_src" class="img-thumbnail rounded">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{$data['marketInfo'][0]->url}}" alt="" style="margin:15px 30px;width: 150px;height: 150px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>


    <script>

        $(document).ready(function () {
            $('#has_product').on('change', function () {
                var $data = $('#has_product option:selected').data('foo');
                if ($data == "1") {
                    $('#category_selection').attr('disabled', false);
                } else {
                    $('#category_selection').attr('disabled', true);
                }
            })
        })
        $('#closeBtn').on('click', function () {
            $('#fileUpload').css('display', 'none');
            $('.chooseImage').css('border', 'none');
        })

        $('#saveBtn').on('click', function () {
            $('#fileUpload').css('display', 'none');
            $('.chooseImage').css('border', 'none');
        })

        var buttons = document.getElementsByClassName("fileButton");
        var fileInput  =document.getElementsByClassName('fileInput');
        document.getElementById('marketImage').addEventListener("click", function () {
            fileInput[0].style.display="block";
            fileInput[1].style.display="none";
            ara('chosenImageMarket','market_Image_src','marketPriority');
        });
        document.getElementById('iconImage').addEventListener("click", function () {
            fileInput[1].style.display="block";
            fileInput[0].style.display="none";
            ara('chosenImageicon','icon_image_src','iconPriority');
        });
        $('#marketURL').on('change',function(){
            readURL(this,'market_Image_src');
            $('#marketPriority').attr('value','0');
            $('#fileUpload').css('display','none');
        })
        $('#marketIconImage').on('change',function(){
            readURL(this,'icon_image_src');
            var isFirst = true;
            if (!isFirst) {
                return;
            }
            $('#iconPriority').attr('value','0');
            isFirst = false;
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
