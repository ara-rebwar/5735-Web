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
                            <h3 class="card-title">Slide List</h3>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Market</th>
                                    <th>Text</th>
                                    <th>Order</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a=0;
                                while ($a<count($slideList)){  ?>
                                <tr>
                                    <td>{{$slideList[$a]->slideId}}</td>
                                    <td>{{$slideList[$a]->slideProduct}}</td>
                                    <td>{{$slideList[$a]->slideMarket}}</td>
                                    <td>{{$slideList[$a]->text}}</td>
                                    <td>{{$slideList[$a]->order}}</td>


                                    <td> <a  href="{{route('showEditSlideID',$slideList[$a]->slideId)}}"  class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
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
