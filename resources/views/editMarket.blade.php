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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Market</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('updateMarketID',$marketInfo[0]->marketId)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="marketId" value="{{$marketInfo[0]->marketId}}">
                            <input type="hidden" name="mediaId" value="{{$marketInfo[0]->imageId}}">

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Market Name" name="marketName" value="{{$marketInfo[0]->marketName}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Rate</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Rate" name="marketRate" value="{{$marketInfo[0]->rate}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" name="marketAddress" value="{{$marketInfo[0]->address}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" name="marketDescription" value="{{$marketInfo[0]->description}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" name="marketPhone" value="{{$marketInfo[0]->phone}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Mobile</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile" name="marketMobile" value="{{$marketInfo[0]->mobile}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Information</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Information" name="marketInformation" value="{{$marketInfo[0]->information}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Delivery Fee</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Delivery Fee" name="marketDeliveryFee" value="{{$marketInfo[0]->deliveryFee}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Admin Commission</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Admin Commission" name="marketAdminCommission" value="{{$marketInfo[0]->adminCommission}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Default Tax</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Default Tax" name="marketDefaultTax" value="{{$marketInfo[0]->defaultTax}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Latitude</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Latitude"  name="marketLatitude" value="{{$marketInfo[0]->latitude}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Longitude</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Longitude"  name="marketLongitude" value="{{$marketInfo[0]->longitude}}">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Closed</label>
                                        <select class="form-control" name="marketClosed">
                                            <option disabled selected>Closed</option>
                                            <?php
                                            if ($marketInfo[0]->closed  == 1){  ?>
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                            <?php    }else{  ?>
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                            <?php    }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Available For Delivery</label>
                                        <select class="form-control" name="marketAvailableForDelivery">
                                            <option disabled >Available for delivery</option>
                                            <?php
                                            if ($marketInfo[0]->availableForDelivery  == 1){  ?>
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        <?php    }else{  ?>
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        <?php    }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Delivery Range</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Delivery Range" name="marketDeliveryRange" value="{{$marketInfo[0]->deliveryRange}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Distance</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Distance" name="marketDistance" value="{{$marketInfo[0]->distance}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Image Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Name" name="marketImageName" value="{{$marketInfo[0]->name}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        {{--                                    <label for="exampleInputEmail1">Image URL</label>--}}
                                        {{--                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Url" name="marketURL">--}}
                                        <label for="exampleInputEmail1">Market Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="marketURL">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Thumb</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Thumb" name="marketThumb" value="{{$marketInfo[0]->thumb}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Icon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Icon" name="marketIcon" value="{{$marketInfo[0]->icon}}">
                                    </div>
                                    <div class="form-group" style="width:31%;margin:0% 1%;">
                                        <label for="exampleInputEmail1">Size</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Size" name="marketimageSize" value="{{$marketInfo[0]->size}}">
                                    </div>
                                </div>
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

@endsection
