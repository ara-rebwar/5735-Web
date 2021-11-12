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
        <h2>Add Market</h2>
      </div>

      @if(session('marketSuccessMsg'))
        <div class="alert alert-success">
          {{session('marketSuccessMsg')}}
        </div>
      @endif
      <form  action="{{route('insertMarket')}}" method="post">
        {{csrf_field()}}
        <div class="form-container">
          <!-- //row0 -->
            <div class="rows">
              <div class="items">
                  <input type="text" name="marketName" value="" class="form-control"placeholder="name">
              </div>
              <div class="items">
                  <input type="text" name="marketRate" value=""class="form-control" placeholder="rate">
              </div>
            </div>
            <!-- //row1 -->
            <div class="rows">
              <div class="items">
                  <input type="text" name="marketDescription" value=""class="form-control" placeholder="description">
              </div>
              <div class="items">
                  <input type="text" name="marketPhone" value=""class="form-control" placeholder="phone">
              </div>
              <div class="items">
                  <input type="text" name="marketMobile" value=""class="form-control" placeholder="mobile">
              </div>
            </div>
            <!-- //row2 -->
            <div class="rows">
              <div class="items">
                  <input type="text" name="marketInformation" value=""class="form-control" placeholder="information">
              </div>
              <div class="items">
                  <input type="text" name="marketDeliveryFee" value=""class="form-control" placeholder="deliveryFee">
              </div>
              <div class="items">
                  <input type="text" name="marketAdminCommission" value=""class="form-control" placeholder="adminCommission">
              </div>
            </div>
            <!-- //row3-->
            <div class="rows">
              <div class="items">
                  <input type="text" name="marketDefaultTax" value=""class="form-control" placeholder="defaultTax">
              </div>
              <div class="items">
                  <input type="text" name="marketLatitude" value=""class="form-control" placeholder="latitude">
              </div>
              <div class="items">
                  <input type="text" name="marketLongitude" value=""class="form-control" placeholder="longitude">
              </div>
            </div>
            <!-- //row4-->
            <div class="rows">
              <div class="items">
                <select class="form-control" name="marketClosed">
                  <option disabled selected>Closed</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              <div class="items">
                <select class="form-control" name="marketAvailableForDelivery">
                  <option disabled selected>Available for delivery</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              <div class="items">
                  <input type="text" name="marketDeliveryRange" value=""class="form-control" placeholder="delivery Range">
              </div>
            </div>
            <!-- //row5-->
            <div class="rows">
              <div class="items">
                <input type="text" name="marketDistance" value=""class="form-control" placeholder="distance">
              </div>
              <div class="items">
                <input type="text" name="marketImageName" value=""class="form-control" placeholder="image Name">
              </div>
              <div class="items">
                <input type="text" name="marketURL" value=""class="form-control" placeholder="image URL">
              </div>
            </div>
            <!-- //row6-->
            <div class="rows">
              <div class="items">
                <input type="text" name="marketThumb" value=""class="form-control" placeholder="image Thumb">
              </div>
              <div class="items">
                <input type="text" name="marketIcon" value=""class="form-control" placeholder="Icon">
              </div>
              <div class="items">
                <input type="text" name="marketimageSize" value=""class="form-control" placeholder="image Size">
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
