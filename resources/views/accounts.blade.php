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
    @if(session('successAccountMsg'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('successAccountMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Account Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('insertAccount')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Market</label>
                            <select name="market" class="form-control" >
                                <option selected disabled>None</option>
                                <?php
                                $a=0;
                                    while($a<count($market)){ ?>
                                <option value="{{$market[$a]->id}}">{{$market[$a]->name}}</option>
                                <?php $a++;  }
                                ?>
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>



        </div>
    </div>

@endsection
