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
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('insertProduct')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="productName">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productName'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" name="productPrice">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productPrice'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Discount Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Discount Price" name="productDiscountPrice">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productDiscountPrice'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Description" name="productDescription">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productDescription'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Ingredients</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Ingredients" name="productIngredients">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productIngredients'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Package Items Count</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Items Count" name="productPackageItemsCount">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productPackageItemsCount'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Capacity</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Capacity" name="productCapacity">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productCapacity'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Unit</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Unit" name="productUnit">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productUnit'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Featured</label>
                                        <select class="form-control" name="productFeatured">
                                            <option disabled selected>Featured</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productFeatured'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Deliverable</label>
                                        <select class="form-control" name="productDeliverable">
                                            <option disabled selected>Deliverable</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productDeliverable'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Market</label>
                                        <select class="form-control" name="productMarket" id="productMarket">
                                            <option disabled selected>Select Market</option>
                                            <?php
                                            $a=0;

                                            while ($a < count($data['market'])) {  ?>
                                            <option value="<?php echo $data['market'][$a]->id; ?>"><?php echo $data['market'][$a]->name; ?></option>
                                            <?php $a++; }
                                            ?>

                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productMarket'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Image Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Name" name="productImageName">
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
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Thumb"  name="productThumb" >
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productThumb'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Icon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Icon" name="productIcon">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productIcon'){{$message}}@enderror</label>
                                    </div>
                                </div>


{{--                                <div class="row">--}}
{{--                                    <div class="form-group" style="width:31%;margin:0% 1%;">--}}
{{--                                        <label for="exampleInputEmail1">Closed</label>--}}
{{--                                        <select class="form-control" name="marketClosed">--}}
{{--                                            <option disabled selected>Closed</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group" style="width:31%;margin:0% 1%;">--}}
{{--                                        <label for="exampleInputEmail1">Available For Delivery</label>--}}
{{--                                        <select class="form-control" name="marketAvailableForDelivery">--}}
{{--                                            <option disabled selected>Available for delivery</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group" style="width:31%;margin:0% 1%;">--}}
{{--                                        <label for="exampleInputEmail1">Delivery Range</label>--}}
{{--                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Delivery Range" name="marketDeliveryRange">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">

                                    <div class="form-group" style="width:47%;margin:0% 1.3%;">
                                        <label for="exampleInputEmail1">Image Size</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Size" name="productimageSize">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productimageSize'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group" style="width:47%;margin:0% 1.3%;">
                                        <label for="exampleInputEmail1">Select Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option disabled selected>Select Category</option>
{{--                                            <?php--}}
{{--                                            $a=0;--}}

{{--                                            while ($a < count($data['type'])) {  ?>--}}
{{--                                            <option value="<?php echo $data['type'][$a]->id; ?>"><?php echo $data['type'][$a]->types; ?></option>--}}
{{--                                            <?php $a++; }--}}
{{--                                            ?>--}}


                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('productimageSize'){{$message}}@enderror</label>
                                    </div>
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="form-group" style="width:31%;margin:0% 1%;">--}}
{{--                                        <label for="exampleInputEmail1">Thumb</label>--}}
{{--                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Thumb" name="marketThumb">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group" style="width:31%;margin:0% 1%;">--}}
{{--                                        <label for="exampleInputEmail1">Icon</label>--}}
{{--                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Icon" name="marketIcon">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group" style="width:31%;margin:0% 1%;">--}}
{{--                                        <label for="exampleInputEmail1">Size</label>--}}
{{--                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Size" name="marketimageSize">--}}
{{--                                    </div>--}}
{{--                                </div>--}}




                                {{--                            <div class="form-group">--}}
                                {{--                                <label for="exampleInputPassword1">Password</label>--}}
                                {{--                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                                {{--                            </div>--}}
                                {{--                            <div class="form-group">--}}
                                {{--                                <label for="exampleInputFile">File input</label>--}}
                                {{--                                <div class="input-group">--}}
                                {{--                                    <div class="custom-file">--}}
                                {{--                                        <input type="file" class="custom-file-input" id="exampleInputFile">--}}
                                {{--                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="input-group-append">--}}
                                {{--                                        <span class="input-group-text" id="">Upload</span>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                {{--                            <div class="form-check">--}}
                                {{--                                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                                {{--                                <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                                {{--                            </div>--}}
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
                                $('#category').append("<option value=" + data[a].mcId + ">" + data[a].category_name + "</option>");
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
