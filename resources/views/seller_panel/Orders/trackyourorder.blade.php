@extends('baseraUserDashboard/layouts/forms')

@section('title')
Product Detail | Basera
@stop

@section('formcontent')
<style type="text/css">
.price{
    font-weight: 400;
    color: #008da8;
    text-align: center;
    font-size: 24px;
    line-height: 24px;
    margin: 0px 0 0;
}
</style>
<div style="padding: 40px; background-color: white; color: purple;"> 
<h3> New Orders Status </h3> </div>
<div style="margin-top: 40px;"> </div>

  
    <div class="alert alert-success" style="display: none;" id="msgdiv">
        <ul>
            <li id="msg"></li>
        </ul>
    </div>


 

<div style="background-color: white;">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Code</th>
      <th scope="col">Product Title</th>
      <th scope="col">Product Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Color</th>
      <th scope="col"> Order Status </th>
    </tr>
  </thead>
  <tbody>

<?php
    $sNo = 1;
    foreach($aProducts as $index => $value)
    {
        $sColors = "";
        $sDeliveryStatus = "";

        $sProductTitle       = $value['aProducts'][$index]['ProductTitle'];
        $sProductDescription = $value['aProducts'][$index]['ProductDescription'];
        $sProductCode        = $value['aProducts'][$index]['ProductCode'];
        $dQuantity           = $value['Quantity'];
        $iDeliveryStatus     = $value['aProducts'][$index]['DeliveryStatus'];
        $iTempCartItemId     = $value['aProducts'][$index]['TempCartItemId'];

        if($value['Colors'] == 1)
            $sColors = "White with Gold";
        if($value['Colors'] == 2)
            $sColors = "Red";
        if($value['Colors'] == 3)
            $sColors = "Green";
        if($value['Colors'] == 4)
            $sColors = "Blue";

        if($iDeliveryStatus == 0)
            $sDeliveryStatus = "New Order Arrived";
        if($iDeliveryStatus == 1)
            $sDeliveryStatus = "Started Packing";
        if($iDeliveryStatus == 2)
            $sDeliveryStatus = "Order Dispatched";

        $sProductImageTitle = $value['aProductImages']['ProductImageTitle'];

        ?>

    <tr>
      <th scope="row">{{ $sNo }}</th>
      <td>{{ $sProductCode }}</td>
      <td>{{ $sProductTitle }}</td>
      <td>{{ $sProductDescription }}</td>
      <td>{{ $dQuantity }}</td>
      <td>{{ $sColors }}</td>

      @if($iDeliveryStatus == 2)
        <td><a href="#" onclick="OrderStatus('Order Dispatched', 'This Order has been dispatched successfully no any action required', 'info')">{{ $sDeliveryStatus }} </a> </td>
      @else
        <td><a href="#" onclick="UpdateStatus('{{$iTempCartItemId}}');">{{ $sDeliveryStatus }} </a> </td>
      @endif
    </tr>

        <?php
        $sNo++;
    }

?>
</tbody>
</table>
<script type="text/javascript">
    function OrderStatus(sTitle, sMsg, sStatus)
    {
        swal(sTitle, sMsg, sStatus);
    }

    function UpdateStatus(iOrderId)
    {
              swal({
                    title: "are you sure?",
                    text: "do you want to update this order!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Update!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                  },
                  function(isConfirm){
                    if (isConfirm)
                    {

                            $.ajax({
                                 type: 'get',
                                 url: 'ChangeOrderStatus',
                                 data:{
                                     '_token' : $('input[name=_token]').val(),
                                     'iOrderId' : iOrderId
                                    },
                               success : function (msg)
                               {

                                    swal({
                                        title: "Great",
                                        text: "Order Status Updated..!",
                                        type: "info",
                                        showCancelButton: false,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Processed",
                                        closeOnConfirm: true,
                                      },
                                      function(isConfirm){
                                        if (isConfirm)
                                        {
                                            $("#msgdiv").fadeIn();
                                            $("#msg").html("Record updated please refresh grid to see changes..!");
                                        }
                                    });
                               },
                              });    
                    }else
                    {
                      return false;
                    }
                  });
       
    }
</script>
</div>
@stop
