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


      <form  action="{{route('insertProduct')}}" method="post">
        {{csrf_field()}}
        <div class="form-container">
          <!-- //row0 -->
            <div class="rows">
              <div class="items">
                  <input type="text" name="productName" value="" class="form-control"placeholder="name">
              </div>
              <div class="items">
                  <input type="text" name="productPrice" value=""class="form-control" placeholder="price">
              </div>
              <div class="items">
                  <input type="text" name="productDiscountPrice" value="" class="form-control" placeholder="Discount Price">
              </div>
            </div>
            <!-- //row1 -->
            <div class="rows">
              <div class="items">
                  <input type="text" name="productImage" value=""class="form-control" placeholder="Product Image">
              </div>
              <div class="items">
                  <input type="text" name="productDescription" value=""class="form-control" placeholder="Product Description">
              </div>
              <div class="items">
                  <input type="text" name="productIngredients" value=""class="form-control" placeholder="Ingredients">
              </div>
            </div>
            <!-- //row2 -->
            <div class="rows">
              <div class="items">
                  <input type="text" name="productCapacity" value=""class="form-control" placeholder="Capacity">
              </div>
              <div class="items">
                  <input type="text" name="productUnit" value=""class="form-control" placeholder="Unit">
              </div>
              <div class="items">
                  <input type="text" name="productPackageItemsCount" value=""class="form-control" placeholder="Package Items Count">
              </div>
            </div>
            <!-- //row3-->
            <!-- <div class="rows">
              <div class="items">
                  <input type="text" name="marketDefaultTax" value=""class="form-control" placeholder="defaultTax">
              </div>
              <div class="items">
                  <input type="text" name="marketLatitude" value=""class="form-control" placeholder="latitude">
              </div>
              <div class="items">
                  <input type="text" name="marketLongitude" value=""class="form-control" placeholder="longitude">
              </div>
            </div> -->
            <!-- //row4-->
            <div class="rows">
              <div class="items">
                <select class="form-control" name="productFeatured">
                  <option disabled selected>Featured</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              <div class="items">
                <select class="form-control" name="productDeliverable">
                  <option disabled selected>Deliverable</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              <div class="items">

                  <select class="form-control" name="productMarket">
                    <option disabled selected>Select Market</option>
                    <?php
                    $a=0;

                    while ($a < count($market)) {  ?>
                        <option value="<?php echo $market[$a]->id; ?>"><?php echo $market[$a]->name; ?></option>
                  <?php $a++; }
                     ?>

                  </select>
              </div>
            </div>
            <!-- //row5-->
            <hr>
            <div class="rows">

              <div class="items">
                <input type="text" name="productImageName" value=""class="form-control" placeholder="image Name">
              </div>
              <div class="items">
                <input type="text" name="productURL" value=""class="form-control" placeholder="image URL">
              </div>
              <div class="items">
                <input type="text" name="productThumb" value=""class="form-control" placeholder="image Thumb">
              </div>
            </div>
            <!-- //row6-->
            <div class="rows" >
              <div class="items" style="width:47%;">
                <input type="text" name="productIcon" value=""class="form-control" placeholder="Icon">
              </div>
              <div class="items" style="width:47%;">
                <input type="text" name="productimageSize" value=""class="form-control" placeholder="image Size">
              </div>
            </div>
            <!-- //row6-->
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
