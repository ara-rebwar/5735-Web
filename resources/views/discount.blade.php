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
    @if(session('success'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('success')}}
        </div>
    @endif
    @if(session('deleteMsg'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('deleteMsg')}}
        </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Account Form</h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 my-2" >
                                <form role="form" method="post" action="{{route('insertDiscount')}}">
                                @csrf
                                <input type="hidden" name="market_id" value="{{$market_id}}">
                                <p for="">Select Discount Time</p>
                                <div class="form-group">
                                    <label for="">Discount Type</label>
                                    <input type="text" name="discount_type" class="form-control" placeholder="Discount Type" >
                                </div>
                                <div class="form-group">
                                    <label for="">Discount Rate</label>
                                    <input type="text" name="rate" class="form-control" placeholder="Discount Rate" >
                                </div>
                                <div class="form-group">
                                    <select class="mul-select form-control" multiple="true" style="width: 100%" name="days[]" id="days_selection">
                                        <?php
                                        $a=0;
                                        while($a<count($days)){?>
                                        <option value="{{$days[$a]->id}}" style="text-transform: capitalize;">{{$days[$a]->day}}</option>
                                        <?php     $a++;}
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Start Time</label>
                                    <input type="time" name="start_time" id="aa" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">End Time</label>
                                    <input type="time" name="end_time" id="" class="form-control">
                                </div>
                                <div class="card-header">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-8 my-2">
                                <div>
                                    <p for="">Discount List</p>
                                </div>
                                <div  class="py-2" style="overflow-y: scroll;height: 30rem;">
                                    <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Rate</th>
                                                <th>Market</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($discountList as $discount)
                                            <tr>
                                                <td>{{$discount->type_name}}</td>
                                                <td>{{$discount->rate}}</td>
                                                <td>{{$discount->name}}</td>
                                                <td>{{$discount->start_time}}</td>
                                                <td>{{$discount->end_time}}</td>
                                                <td>
                                                    <form action="{{route('deleteDiscount')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="marketId" value="{{$discount->market_id}}">
                                                        <input type="hidden" name="discountId" value="{{$discount->id}}">
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash "></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection
