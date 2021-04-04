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
    @if(session('updateTypeMsg'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('updateTypeMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            @if(session('successTypeMsg'))
                <div class="alert alert-success">
                    {{session('successTypeMsg')}}
                </div>
            @endif
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Edit Type Form</h3>
                </div>
                <form role="form" method="post" action="{{route('updateType')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="typeID" value="{{$data[0]->typeId}}">
                    <input type="hidden" name="mediaID" value="{{$data[0]->image}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Type Name" name="types" value="{{$data[0]->types}}">
                        </div>
                        <div class="form-group">
                            <label for=""> Has Product</label>
                            <select name="has_product" class="form-control">
                                <option disabled >None</option>
                                <?php
                                if ($data[0]->has_product == 0){?>
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                                <?php }else{?>
                                <option value="0">No</option>
                                <option value="1" selected>Yes</option>
                          <?php      }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Name" name="imageName" value="{{$data[0]->name}}" >
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Thumb</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Thumb" name="thumb" value="{{$data[0]->thumb}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Thumb</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Thumb" name="thumb" value="{{$data[0]->thumb}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Size" name="size" value="{{$data[0]->size}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Icon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Icon" name="icon" value="{{$data[0]->icon}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Select Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="url">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <img src="{{$data[0]->url}}"  style="margin:15px 30px;width: 150px;height: 150px;">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <script>

    </script>

@endsection
