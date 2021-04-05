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
    @if(session('typeDeleteMsg'))
        <div class="alert alert-success" style="margin:1% 1.4%;">
            {{session('typeDeleteMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Type List</h3>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type Name</th>
                                    <th>Has Product</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a=0;
                                while ($a<count($typeList)){  ?>
                                <tr>
                                    <td>{{$typeList[$a]->typeId}}</td>
                                    <td>{{$typeList[$a]->types}}</td>
                                    <td>
                                        <?php
                                        if ($typeList[$a]->has_product == 0){
                                            echo 'No';
                                        }else{
                                            echo 'Yes';
                                        }
                                        ?>
                                    </td>
                                    <td> <a  href="{{route('showEditType',$typeList[$a]->typeId)}}"  class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('deleteType')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="TypeId"  >

                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
