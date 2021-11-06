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
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Mobile 1</th>
                                            <th>Products</th>
                                            <th>Category</th>
                                            <th>Discount</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a=0;
                                        while ($a<count($marketList)){  ?>
                                        <tr>
                                            <td>{{$marketList[$a]->marketId}}</td>
                                            <td>{{$marketList[$a]->name}}</td>
                                            <td>{{$marketList[$a]->address}}</td>
                                            <td>{{$marketList[$a]->mobile1}}</td>
                                            <td><a href="{{route('showProductByMarketId',$marketList[$a]->marketId)}}" class="btn btn-dark"><i class="fa fa-list white"></i></a></td>
                                            <td> <a  href="{{route('showMarketCategories',$marketList[$a]->marketId)}}"  class="btn btn-warning"><i class="fa fa-th-large"></i></a></td>
                                            <td><a href="{{route('showDiscount',$marketList[$a]->marketId)}}" class="btn btn-success"><span class="fa fa-percent"></span></a></td>
                                            <td> <a  href="{{route('showEditMarketID',$marketList[$a]->marketId)}}"  class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                            <td>
                                                <form action="{{route('deleteMarket')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="marketId" value="{{$marketList[$a]->marketId}}}}">
                                                    <input type="hidden" name="mediaId" value="{{$marketList[$a]->mediaId}}}}">
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
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
