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
                                                <button class="btn btn-danger showAlertButton" type="button" data-action="{{$marketList[$a]->marketId}}" id="showAlertButton"><i class="fa fa-trash"></i></button>
                                                <form action="{{route('deleteMarket')}}" method="post" id="Delete_market_form<?php echo $marketList[$a]->marketId; ?>">
                                                    @csrf
                                                    <input type="hidden" name="marketId" value="{{$marketList[$a]->marketId}}">
                                                    <input type="hidden" name="mediaId" value="{{$marketList[$a]->mediaId}}">
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

    <div id="checkPasswordForm" style="position:absolute;left:0 ; top:0;width: 100%;height: 110vh;display: none;justify-content: center;align-items: center; z-index:4;background: rgba(240,240,240,0.9)">
        <div class="card" style="width: 600px; background: white;">
            <div class="card-header" style="text-align: center;">
                <h5>Confirm Your Password</h5>
                <label id="passwordCloseForm"class="rounded" style="position:absolute;right: 15px;top:10px;font-weight: 200;border:1px solid lightgrey;padding: 4px 10px;" >X</label>
            </div>
            <div class="card-body">

                <form action="{{route('checkPassword')}}" method="post" id="passwordForm">
                    @csrf
                    <?php
                    $userId =\Illuminate\Support\Facades\Auth::guard()->user()->getAuthIdentifier();
                    ?>
                    <input type="hidden" name="userId" value="<?php echo $userId ?>">
                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" name="checkPassword" id="checkPassword" class="form-control"  placeholder="Write Your Current Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="checkPasswordInput">Confirm <i class="fa fa-key mx-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(e){

            var id= "";
            $('.showAlertButton').on('click',function(){
                $('#checkPasswordForm').css('display','flex');
                id=$(this).attr('data-action');
            })

            $('#passwordCloseForm').on('click',function(){
                $('#checkPasswordForm').css('display','none');
            })
            $('#passwordForm').on('submit',function (e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"/checkPassword",
                    type:"POST",
                    data:$(this).serialize(),
                    success:function(data){
                        if (data == 1){
                            if (confirm('Are You Sure want to Delete This Market')){
                                $('#Delete_market_form'+id).submit();
                                $('#checkPasswordForm').css('display','none');
                            }
                        }else{
                            alert('Your password is Incorrect');
                        }
                    }
                });
            });
        })
    </script>
@endsection
