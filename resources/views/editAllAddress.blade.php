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

            @if(session('updateLocationMsg'))
                <div class="alert alert-success">
                    {{session('updateLocationMsg')}}
                </div>
            @endif
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Edit Location Form</h3>
                </div>
                <form role="form" method="post" action="{{route('UpdateLocation')}}" >
                    @csrf
                    <input type="hidden" name="locationId" value="{{$data->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Location</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Location" name="place1" value="{{$data->place1}}">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1">Second Location</label>--}}
{{--                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Second Location" name="place2" value="{{$data->place2}}">--}}
{{--                        </div>--}}
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
