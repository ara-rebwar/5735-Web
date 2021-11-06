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
    @if(session('successMSG'))
        <div class=" alert alert-success" style="margin:1% 1.4%;">
            {{session('successMSG')}}
        </div>
    @endif

        <div class=" alert alert-warning" style="margin:1% 1.4%;display: none;" id="alertMessage" >
            Please upload image to all your products
        </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="">

                <div class="col-mid-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Market Category Form</h3>
                        </div>

                        @if($data != null)
                        <form role="form" method="post" action="{{route('insertMarketCategory')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="limit" value="{{count($data)}}">
                                <input type="hidden" name="market_id" id='market_id' value="{{$data[0]->market_id}}">
                                <?php
                                $a=0;
                                while ($a<count($data)){ ?>
                                <input type="hidden" name="category_id<?php echo $a;?>" value="{{$data[$a]->id}}">
                                <div class="row" >
                                    <div class="form-group col-md-4" style="margin:0px;display: flex;justify-content: center;align-items: center"  >
                                        <h3 class="card-title" style="text-transform: capitalize">Category : <?php echo $data[$a]->category_name; ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12"style="margin:0px;">
                                        <label> Image </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="categoryImage<?php echo $a; ?>">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('slideImage'){{$message}}@enderror</label>
                                    </div>
                                </div>
                                    <?php $a++;}
                                    ?>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                use category image <input type="checkbox" name="checkforImage" id="checkforImage">
                            </div>
                        </form>
                        @else
                            <div class="card-body" style="text-align:center">
                                <div class="alert alert-primary">There is No Any Category Found <i class="fa fa-exclamation-triangle"></i></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <script>
        $(document).ready(function (){
            $('#checkforImage').on('change',function (){
                if (this.checked){
                    var market_id= $('#market_id').val();

                    $.ajax({
                        url:'/checkForimage',
                        type:'GET',
                        data:{id:market_id},
                        success:function(data){
                            if(data != 1){
                                $('#alertMessage').css('display','block');
                                $('#checkforImage').prop('checked',false);
                            }else{
                                $('#checkforImage').prop('checked',true);
                            }
                        }
                    })
                }
            });
        });

    </script>

@endsection
