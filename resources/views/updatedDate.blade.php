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

            @if(session('insertUpdateDateMsg'))
                <div class="alert alert-success">
                    {{session('insertUpdateDateMsg')}}
                </div>
            @endif
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Add Update Date Form</h3>
                </div>
                <form role="form" method="post" action="{{route('insertUpdateDate')}}" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Date</label>
                            <input type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="Enter Update Date" name="updateDate">
                        </div>

                        <div class="form-group">
                            <label for="">Select Type</label>
                            <select name="type" class="form-control">
                                <option disabled selected>None</option>
                                <?php
                                $a=0;
                                while ($a<count($data)){ ?>
                                <option value="{{$data[$a]->id}}">{{$data[$a]->type}}</option>
                             <?php $a++; } ?>
                            </select>
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
