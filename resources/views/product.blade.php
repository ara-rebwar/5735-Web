<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>
    <div class="container" >
      <div class="heading">
        <h2>Add Product</h2>
      </div>
      <form  action="{{route('insertProduct')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="marketID" value="{{$id}}">
        <div class="form-container">
            <div class="rows">
              <div class="items">
                  <input type="text" name="productName" value="" class="form-control"placeholder="name">
              </div>
              <div class="items">
                  <input type="text" name="productPrice" value=""class="form-control" placeholder="price">
              </div>
            </div>
            <div class="rows">
              <div class="items">
                  <input type="text" name="productDescription" value=""class="form-control" placeholder="Product Description">
              </div>
              <div class="items">
                  <input type="text" name="productIngredients" value=""class="form-control" placeholder="Ingredients">
              </div>
            </div>
            <!-- //row2 -->
            <div class="rows">
            </div>
{{--            <div class="rows">--}}
{{--              <div class="items">--}}
{{--                  <select class="form-control" name="productMarket">--}}
{{--                    <option disabled selected>Select Market</option>--}}
{{--                    <?php--}}
{{--                    $a=0;--}}
{{--                    while ($a < count($market)) {  ?>--}}
{{--                        <option value="<?php echo $market[$a]->id; ?>"><?php echo $market[$a]->name; ?></option>--}}
{{--                  <?php $a++; }--}}
{{--                     ?>--}}
{{--                  </select>--}}
{{--              </div>--}}
{{--            </div>--}}
            <hr>
            <div class="rows">
              <div class="items">
                <input type="text" name="productURL" value=""class="form-control" placeholder="image URL">
              </div>
            </div>

            <div class="rows">
              <div class="items">
                <input type="submit" name="submit" class="btn btn-success" value="Submit" >
                <input type="reset" name="reset" value="Clear All" class="btn btn-warning">
              </div>
            </div>
        </div>
      </form>
    </div>
  </body>
</html>
