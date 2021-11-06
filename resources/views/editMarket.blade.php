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
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Market Name" name="marketName" value="{{$data['marketInfo'][0]->marketName}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketName'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4" >
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
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" name="marketMobile1" value="{{$data['marketInfo'][0]->mobile1}}">
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketMobile1'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Phone Second Number" name="marketPhone2">
                                        <label style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketPhone2'){{$message}}@enderror</label>
                                    </div>
                                    <div class="form-group col-md-4">
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
                                    <div class="form-group col-md-4">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="marketURL">
                                                <label class="custom-file-label" for="exampleInputFile">Select Market Image</label>
                                            </div>
                                        </div>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketURL'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-md-6" >
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
                                    <div class="form-group col-md-6">
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

                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="mul-select form-control" multiple="true" style="width: 100%" name="category[]" id="category_selection">
                                                <?php
                                                $i=0;
                                                $y =0;
                                                while ($i<count($data['categories'])){
                                                    while ($y < count($data['category'])){
                                                        if ($data['categories'][$i]->category_id == $data['category'][$y]->id){?>
                                                    <option value="{{$data['category'][$y]->id}}" selected>{{$data['category'][$y]->category_name}}</option>
                                                      <?php   }else{?>
                                                        <option value="{{$data['category'][$y]->id}}" >{{$data['category'][$y]->category_name}}</option>
                                                    <?php    }
                                                        $y++;
                                                    }
                                                    $i++;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile1" name="marketIconImage">
                                                <label class="custom-file-label" for="exampleInputFile1">Select Market Icon Image</label>
                                            </div>
                                        </div>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('marketIconImage'){{$message}}@enderror</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <img src="{{$data['marketInfo'][0]->url}}" alt="" style="margin:15px 30px;width: 150px;height: 150px;">
                            </div>
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

@endsection
