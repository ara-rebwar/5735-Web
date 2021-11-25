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

            @if(session('updateUpdateTypeMsg'))
                <div class="alert alert-success">
                    {{session('updateUpdateTypeMsg')}}
                </div>
            @endif
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Edit Location Form</h3>
                </div>
                <form role="form" method="post" action="{{route('UpdateUpdateType')}}" >
                    @csrf
                    <input type="hidden" name="updateTypeId" value="{{$data->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Type</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Update Type" name="updateType" value="{{$data->type}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Type in Kurdish</label>
                            <input type="text" class="form-control"  placeholder="Enter Update Type in Kurdish" name="updateTypeKurdish" value="{{$data->type_kurdish}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    </script>

@endsection
