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
                            <h3 class="card-title">Product List</h3>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Market</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Ingredient</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a=0;
                                while ($a<count($productList)){  ?>
                                <tr>
                                    <td>{{$productList[$a]->productId}}</td>
                                    <td>{{$productList[$a]->productName}}</td>
                                    <td>{{$productList[$a]->name}}</td>
                                    <td>{{$productList[$a]->price}}</td>
                                    <td>{{$productList[$a]->discountPrice}}</td>
                                    <td>{{$productList[$a]->ingredients}}</td>

                                    <td> <a  href="{{route('showEditProductID',$productList[$a]->productId)}}"  class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
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
