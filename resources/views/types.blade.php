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

            @if(session('successTypeMsg'))
                <div class="alert alert-success">
                    {{session('successTypeMsg')}}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Type Form</h3>
                </div>
                <form role="form" method="post" action="{{route('insertType')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Type Name" name="types">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type Name in Kurdish</label>
                            <input type="text" class="form-control"  placeholder="Enter Type Name in Kurdish" name="types_kurdish">
                        </div>

                        {{--                                    ////////////////////--}}


                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Image URL</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <button class="btn btn-success" type="button"  id="productImage">Select Product Image <i class="fa fa-paperclip mx-2"></i> </button>
                                </div>
                            </div>


                            <div id="fileUpload" style="display: none;justify-content: center;align-items: center;width: 100%;height: 100%;position:fixed;top: 0;left: 0;z-index: 3;background: rgba(255,255,255,0.8);">
                                <div class="card" style="width:50%;height: 80%;background:#f8f9fa;">
                                    <div class="card-header " style="display: flex;justify-content: center;align-items: center;">
                                        <h1 class="card-title ">Upload File</h1>
                                        <button type="button" class="close" style="position:absolute;right:10px;" id="closeBtn" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="card-header fileInput">
                                        <div class="input-group ">
                                            <div class="custom-file ">
                                                <input type="file" class="custom-file-input " id="url"  name="url">
                                                <input type="hidden" id="typePriority" value="2" name="typePriority">
                                                <label class="custom-file-label" for="exampleInputFile1">Select Product Image</label>
                                            </div>
                                            <label  style="padding:0px;margin: 0px;font-size: 12px;" class="text-danger">@error('url'){{$message}}@enderror</label>
                                        </div>
                                    </div>

                                    <div style="height: 100%;overflow-y: scroll;">
                                        <div class="card-body" style="">
                                            <div class="headline alert bg-gradient-primary " >Icon Images</div>
                                            <div class="row " style="display: flex;justify-content: center;">
                                                @foreach($marketImages as $image)
                                                    <div class="col-md-2 imageContainer img-thumbnail rounded m-2">
                                                        <img src="{{$image->url}}" class="rounded my-2 chooseImage" style="width: 100%;transition: 0.5s ease;" id="{{$image->id}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="hidden" name="chosenImageurl" id="chosenImageurl">
                                        <button type="button" class="btn btn-primary" id="saveBtn">Save<i class="fa fa-save mx-2"></i></button>
                                        <button type="button" class="btn btn-warning" id="resetImageBtn"> <i class=" fa fa-undo"></i></button>
                                    </div>
                                </div>
                            </div>
                            {{--                                        ////////////////////////////--}}
                        <div class="row">
                            <div class="col-md-2">
                                <img src=""  id="url_Image_src" class="img-thumbnail rounded">
                            </div>
                        </div>
                    </div>
                    </div>








                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <script>
        $('#closeBtn').on('click', function () {
            $('#fileUpload').css('display', 'none');
            $('.chooseImage').css('border', 'none');
        })
        $('#saveBtn').on('click', function () {
            $('#fileUpload').css('display', 'none');
            $('.chooseImage').css('border', 'none');
        })
        $('#resetImageBtn').on('click',function(){
            $('#urlPriority').attr('value',"2");
            alertify.notify('Image Unselected ...', 'warning', 5, function(){  console.log('dismissed'); });
            $('#url_Image_src').attr('src','');
        })
        var buttons = document.getElementsByClassName("fileButton");
        document.getElementById('urlImage').addEventListener("click", function () {
            ara('chosenImageurl','url_Image_src','urlPriority');
        });
        $('#url').on('change',function(){
            readURL(this,'url_Image_src');
            $('#urlPriority').attr('value','0');
            alertify.notify('Image Selected ...', 'success', 5, function(){  console.log('dismissed'); });
            $('#fileUpload').css('display','none');
        })
        function  ara(name,imgSrc,priority) {
            var isFirst = true;
            document.getElementById('fileUpload').style.display = "flex";
            document.querySelectorAll('.chooseImage').forEach(item => {
                item.addEventListener("click", event => {
                    if (!isFirst) {
                        return;
                    }
                    document.getElementById(priority).setAttribute('value','1');
                    document.getElementById('fileUpload').style.display="none";
                    document.getElementById(name).setAttribute('value', item.getAttribute('src'));
                    document.getElementById(imgSrc).setAttribute('src',item.getAttribute('src'));
                    alertify.notify('Image Selected ...', 'success', 5, function(){  console.log('dismissed'); });
                    isFirst = false;
                })
            });
        }

        function readURL(input,image) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#"+image).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
