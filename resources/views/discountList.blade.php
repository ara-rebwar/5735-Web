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
    @if(session('deleteMarketMsg'))
        <div class="alert alert-success" style="margin:1% 1.4%;">
            {{session('deleteMarketMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Market List</h3>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Rate</th>
                                    <th>Discount Type</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $discount)
                                <tr>
                                    <td>{{$discount->id}}</td>
                                    <td>{{$discount->name}}</td>
                                    <td>{{$discount->rate}}</td>
                                    <td>{{$discount->type_name}}</td>
                                    <td>{{$discount->day}}</td>
                                    <td>{{$discount->start_time}}</td>
                                    <td>{{$discount->end_time}}</td>
                                    <td> <a  href="{{route('showEditMarketID',$discount->id)}}"  class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('deleteMarket')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="discount_id" value="{{$discount->id}}">
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->



                    </div>
                    <!-- /.card -->
                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
