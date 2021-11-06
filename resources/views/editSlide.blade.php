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
                                        @foreach($data['slideProduct'] as $slide)
                                            @if($slide->product == $data['slide'][0]->product)
                                                <option value="{{$slide->product}}" selected>{{$data['slide'][0]->name}}</option>
                                            @else
                                                <option value="{{$slide->product}}" >{{$data['slide'][0]->name}}</option>
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
                                    <label> Image </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="slideImage" >
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideImage'){{$message}}@enderror</label>
                                </div>
                                <div class="form-group">
                                    <label> Order Number</label>
                                    <input type="text"  class="form-control" placeholder="Enter Order Number" name="slideOrderNumber" value="{{$data['slide'][0]->order}}">
                                    <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideOrderNumber'){{$message}}@enderror</label>
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
            // var id=$('#slideMarket').val();
            // $('#slideMarket option[value=id]').attr('selected','selected');
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
    </script>

@endsection
