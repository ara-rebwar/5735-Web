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

            @if(session('updateAddressMsg'))
                <div class="alert alert-success">
                    {{session('updateAddressMsg')}}
                </div>
            @endif
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Edit Address Form</h3>
                </div>
                <form role="form" method="post" action="{{route('UpdateAddress')}}" >
                    @csrf
                    <input type="hidden" name="addressId" value="{{$data->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Location</label>
{{--                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Location" name="place1" value="{{$data->place1}}">--}}
                            <select name="place1" class="form-control">
                                <option disabled selected>None</option>
                                @foreach($locations as $location)
                                    @if($location->id == $data->place1)
                                        <option value="{{$location->id}}" selected>{{$location->place1}}</option>
                                    @else
                                        <option value="{{$location->id}}">{{$location->place1}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Second Location</label>
{{--                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Second Location" name="place2" value="{{$data->place2}}">--}}
                            <select name="place2" class="form-control">
                                <option disabled selected>None</option>
                                @foreach($locations as $location)
                                    @if($location->id == $data->place2)
                                        <option value="{{$location->id}}" selected>{{$location->place1}}</option>
                                    @else
                                        <option value="{{$location->id}}">{{$location->place1}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" name="price" value="{{$data->price}}">
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
