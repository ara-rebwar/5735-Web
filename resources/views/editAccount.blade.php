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
    @if(session('updateAccountMsg'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('updateAccountMsg')}}
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('updateAccount')}}">
                    @csrf
                    <input type="hidden" name="accountId" value="{{$data['account'][0]->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" value="{{$data['account'][0]->username}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{$data['account'][0]->password}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Market</label>
                            <select name="market" class="form-control" >
                                <option  disabled>None</option>
                                <?php
                                $a=0;
                                while($a<count($data['market'])){
                                    if ($data['market'][$a]->id == $data['account'][0]->market){?>
                                <option value="{{$data['market'][$a]->id}}" selected>{{$data['market'][$a]->name}}</option>
                              <?php      }else{ ?>
                                <option value="{{$data['market'][$a]->id}}" >{{$data['market'][$a]->name}}</option>
                               <?php     }
                                    ?>

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
