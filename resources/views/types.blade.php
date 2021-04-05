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
    @if(session('slideInsertSuccessMsg'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('slideInsertSuccessMsg')}}
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
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('insertType')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Type Name" name="types">
                        </div>

                        <div class="form-group">
                            <label for=""> Has Product</label>
                            <select name="has_product" class="form-control">
                                <option disabled selected>None</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Name" name="imageName">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Thumb</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Thumb" name="thumb">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Size" name="size">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Icon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Icon" name="icon">
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
