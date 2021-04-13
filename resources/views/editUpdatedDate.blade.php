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

            @if(session('updateUpdatedDateMsg'))
                <div class="alert alert-success">
                    {{session('updateUpdatedDateMsg')}}
                </div>
            @endif
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Edit Location Form</h3>
                </div>
                <form role="form" method="post" action="{{route('UpdateUpdateDate')}}" >
                    @csrf
                    <input type="hidden" name="updateDateId" value="{{$data['updatedDate']->id}}">
                    <div class="card-body">

                        <div class="form-group">
                            <label >Select Update Type</label>
                            <select name="type" class="form-control">
                                <option disabled>None</option>
                                <?php
                                $a=0;
                                while ($a<count($data['update_type'])){
                                if ($data['update_type'][$a]->id == $data['updatedDate']->type){ ?>
                                <option value="{{$data['update_type'][$a]->id}}" selected>{{$data['update_type'][$a]->type}}</option>
                              <?php  }else{ ?>
                                <option value="{{$data['update_type'][$a]->id}}">{{$data['update_type'][$a]->type}}</option>
                             <?php    }?>
                           <?php   $a++;  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Date</label>
                            <input type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="Enter Update Type" name="updateDate" value="{{$data['updatedDate']->date}}">
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
