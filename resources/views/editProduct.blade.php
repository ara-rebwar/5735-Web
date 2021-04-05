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
    @if(session('updateProductMsg'))
        <div class="alert alert-success" style="margin:1% 1.4%;">
            {{session('updateProductMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('updateProductId',$data['product'][0]->productId)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="mediaId" value="{{$data['product'][0]->imageId}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="productName" value="{{$data['product'][0]->productName}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productName'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" name="productPrice" value="{{$data['product'][0]->price}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productPrice'){{$message}}@enderror</label>
                                    </div>

                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Description" name="productDescription" value="{{$data['product'][0]->description}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productDescription'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Ingredients</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Ingredients" name="productIngredients" value="{{$data['product'][0]->ingredients}}">
                                          <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productIngredients'){{$message}}@enderror</label>
                                    </div>

                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Select Market</label>
                                        <select class="form-control" name="productMarket" id="productMarket">
                                            <option disabled >Select Market</option>
                                            <?php
                                            $a=0;
                                            while ($a < count($data['markets'])) {
                                            if ($data['product'][0]->market == $data['markets'][$a]->id ){
                                            ?>
                                            <option value="<?php echo $data['markets'][$a]->id; ?>" selected><?php echo $data['markets'][$a]->name; ?></option>
                                            <?php }else{  ?>
                                            <option value="<?php echo $data['markets'][$a]->id; ?>" ><?php echo $data['markets'][$a]->name; ?></option>
                                            <?php }
                                            $a++; }
                                            ?>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productMarket'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Image Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Name" name="productImageName" value="{{$data['product'][0]->imageName}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productImageName'){{$message}}@enderror</label>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Image URL</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="productURL">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productURL'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Image Thumb</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Thumb"  name="productThumb" value="{{$data['product'][0]->thumb}}" >
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productThumb'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Icon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Icon" name="productIcon" value="{{$data['product'][0]->icon}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productIcon'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group" style="width:47%;margin:0% 1.3%;">
                                        <label for="exampleInputEmail1">Image Size</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Size" name="productimageSize" value="{{$data['product'][0]->size}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productimageSize'){{$message}}@enderror</label>
                                    </div>

                                    <div class="form-group" style="width:47%;margin:0% 1.3%;">
                                        <label for="exampleInputEmail1">Select Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option disabled selected>Select Category</option>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productimageSize'){{$message}}@enderror</label>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <img src="{{$data['product'][0]->url}}" alt="" style="margin:15px 30px;width: 150px;height: 150px;">
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        $(document).ready(function(e){
            $('#productMarket').on('change',function (e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id=$("#productMarket").val();
                $.ajax({
                    url:"/product/{id}",
                    type:"GET",
                    data:{data:id},
                    success:function(data){
                        var data = JSON.parse(data);
                        if (data != "") {
                            $('#category').empty();
                            $('#category').append("<option disabled selected > None</option>");
                            for (var a = 0; a < data.length; a++) {
                                $('#category').append("<option value=" + data[a].cid + ">" + data[a].category_name + "</option>");
                            }
                        }else{
                            $('#category').empty();
                            $('#category').append("<option disabled selected > None</option>");
                        }
                    }
                });

            });
        });
    </script>

@endsection
