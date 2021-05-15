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
    @if(session('marketSuccessMsg'))
        <div class="alert alert-success" style="margin:1% 1.4%;">
            {{session('marketSuccessMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Market Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('insertMarket')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Market Name" name="marketName">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketName'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Rate</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Rate" name="marketRate">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketRate'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Address</label>
                                    <select name="marketAddress" id="" class="form-control">
                                        <option disabled selected>None</option>
                                        <?php
                                        $aa=0;
                                        while ($aa<count($data['address'])){?>

                                        <option value="{{$data['address'][$aa]->id}}">{{$data['address'][$aa]->place1}}</option>
                                        <?php    $aa++; }
                                        ?>
                                    </select>
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketAddress'){{$message}}@enderror</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" name="marketDescription">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketDescription'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" name="marketPhone">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketPhone'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Information</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Information" name="marketInformation">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketInformation'){{$message}}@enderror</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Closed</label>
                                    <select class="form-control" name="marketClosed">
                                        <option disabled selected>Closed</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketClosed'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Image Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Name" name="marketImageName">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketImageName'){{$message}}@enderror</label>
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
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketURL'){{$message}}@enderror</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Thumb</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Thumb" name="marketThumb">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketThumb'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Icon</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Icon" name="marketIcon">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketIcon'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group" style="width:31%;margin:0% 1%;">
                                    <label for="exampleInputEmail1">Size</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Size" name="marketimageSize">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketimageSize'){{$message}}@enderror</label>
                                </div>
                            </div>



                                <div class="row justify-content-start  h-100">
                                    <div class="form-group " style="width: 50%;">
                                        <select name="type" class="form-control" id="type_Selection" >
                                            <option disabled selected>Select Type</option>
                                            <?php
                                            $a=0;
                                            while ($a<count($data['type'])){?>


                                            <option value="{{$data['type'][$a]->id}}" data-foo="{{$data['type'][$a]->has_product}}">{{$data['type'][$a]->types}}</option>

                                            <?php $a++;}
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <select class="mul-select form-control" multiple="true" style="width: 100%" name="category[]" id="category_selection">
                                              <?php
                                              $a=0;
                                              while ($a<count($data['category'])){?>


                                                  <option value="{{$data['category'][$a]->id}}">{{$data['category'][$a]->category_name}}</option>



                                              <?php $a++;}

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="form-group px-2" style="width: 100%;">
                                        <label for="">Is_by_5735</label>
                                        <select name="is_by_5735" id="" class="form-control">
                                            <option disabled selected>None</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('is_by_5735'){{$message}}@enderror</label>
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
    <script>
        $(document).ready(function (){
            $('#type_Selection').on('change',function(){
                var $data =$('#type_Selection option:selected').data('foo');
                if ($data == "1"){
                   $('#category_selection').attr('disabled',false);
                }else{
                    $('#category_selection').attr('disabled',true);
                }
            })
        })
    </script>

@endsection
