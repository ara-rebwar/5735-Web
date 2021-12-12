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
    @if(session('successProductMsg'))
        <div class="alert alert-success" style="margin:1% 1.4%;">
            {{session('successProductMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('insertProduct')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="marketID" value="{{$id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="productName">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productName'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" name="productPrice">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productPrice'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Description" name="productDescription">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productDescription'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Ingredients</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Ingredients" name="productIngredients">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productIngredients'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Product Name Kurdish</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Product Name in Kurdish" name="productNameKurdish">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productNameKurdish'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Product Name Arabic</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Product Name in Arabic" name="productNameArabic">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productNameArabic'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row" style="margin-left:10px">
                                    <div class="form-group col-md-4" >
                                        <label for="exampleInputEmail1">Select Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option disabled selected>Select Category</option>
                                            @foreach($categories as $data)
                                                <option value="{{$data->id}}">{{$data->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productimageSize'){{$message}}@enderror</label>
                                    </div>
                                    {{--                                    ////////////////////--}}
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Image URL</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <button class="btn btn-success" type="button"  id="productImage">Select Product Image <i class="fa fa-paperclip mx-2"></i> </button>
                                            </div>
                                        </div>
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
                                                            <input type="file" class="custom-file-input " id="productURL"  name="productURL">
                                                            <input type="hidden" id="productPriority" value="2" name="productPriority">
                                                            <label class="custom-file-label" for="exampleInputFile1">Select Product Image</label>
                                                        </div>
                                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productURL'){{$message}}@enderror</label>
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
                                                    <input type="hidden" name="chosenImageProduct" id="chosenImageProduct">
                                                    <button type="button" class="btn btn-primary" id="saveBtn">Save<i class="fa fa-save mx-2"></i></button>
                                                    <button type="button" class="btn btn-warning" id="resetImageBtn"> <i class=" fa fa-undo"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        ////////////////////////////--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src=""  id="product_Image_src" class="img-thumbnail rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('showProductByMarketId',$id)}}" class="btn btn-dark">Back To List <i class="fa fa-list white px-2" ></i></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
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
        $('#resetImageBtn').on('click',function(){
            $('#productPriority').attr('value',"2");
            alertify.notify('Image Unselected ...', 'warning', 5, function(){  console.log('dismissed'); });
            $('#product_Image_src').attr('src','');
        })
        var buttons = document.getElementsByClassName("fileButton");
        document.getElementById('productImage').addEventListener("click", function () {
            ara('chosenImageurl','url_Image_src','urlPriority');
        });
        $('#productURL').on('change',function(){
            readURL(this,'product_Image_src');
            $('#productPriority').attr('value','0');
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
