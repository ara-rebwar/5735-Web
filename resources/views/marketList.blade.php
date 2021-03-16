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
                            <h3 class="card-title">Market List</h3>
                        </div>



                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Rate</th>
                                            <th>Phone</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a=0;
                                        while ($a<count($marketList)){  ?>
                                        <tr>
                                            <td>{{$marketList[$a]->id}}</td>
                                            <td>{{$marketList[$a]->name}}</td>
                                            <td>{{$marketList[$a]->address}}</td>
                                            <td>{{$marketList[$a]->rate}}</td>
                                            <td>{{$marketList[$a]->phone}}</td>

                                            <td> <a  href="{{route('showEditMarketID',$marketList[$a]->id)}}"  class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                            <td><span class="btn btn-danger"><i class="fa fa-trash"></i></span></td>
                                        </tr>
                                        <?php  $a++; }
                                        ?>

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
