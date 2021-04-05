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

            @if(session('categorySuccessMsg'))
                <div class="alert alert-success">
                    {{session('categorySuccessMsg')}}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Category Form</h3>
                </div>

                <!-- form start -->
                <form role="form" method="post" action="{{route('insertCategory')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" name="category">
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
                            <label for="exampleInputEmail1">Image Icon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Icon" name="icon">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Icon" name="size">
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
                    <!-- /.card-body -->

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
