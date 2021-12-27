@extends('barabrAdminDashboard/layouts/forms')

@section('formcontent')
<div class="panel panel-primary" id="panel">

    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-fw fa-star-half-empty"></i>
            @if($sAction == "AddNewData")
            Add New {{ $sTitle }}
            @endif
            
            @if($sAction == "EditData")
            Edit {{ $sTitle }}
            @endif
            @if($sAction == "ViewData")
            View {{ $sTitle }}
            @endif
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>

  <style type="text/css">
    button{
      margin-top: 5px;
    }
    .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group{
      margin-left: 2px;
    }

    .btn{
      padding: 0px 0px;
    }
    input[type="button"]
    {
        width:120px;
        height:60px;
        margin-left:35px;
        display:block;
        background-color:gray;
        color:white;
        border: none;
        outline:none;
    }

    body {
  font: 14px/1 'Open Sans', sans-serif;
  color: #555;
  background: #e5e5e5;
}

.gallery {
  width: 640px;
  margin: 0 auto;
  padding: 5px;
  background: #fff;
  box-shadow: 0 1px 2px rgba(0,0,0,.3);
}

.gallery > div {
  position: relative;
  float: left;
  padding: 5px;
}

.gallery > div > img {
  display: block;
  width: 200px;
  transition: .1s transform;
  transform: translateZ(0); /* hack */
}

.gallery > div:hover {
  z-index: 1;
}

.gallery > div:hover > img {
  transform: scale(1.7,1.7);
  transition: .3s transform;
}

.cf:before, .cf:after {
  display: table;
  content: "";
  line-height: 0;
}

.cf:after {
  clear: both;
}

h1 {
  margin: 40px 0;
  font-size: 30px;
  font-weight: 300;
  text-align: center;
}

  </style>

  @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
  @endif

     <div style="float: right; padding: 16px;"> <a href="#basera" onclick="AjaxPage('Pages/BarabrSystemAdmin/Products/fa-product-hunt/fa-product-hunt', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

     
     <div class="panel-body center-block" style="max-width: 90%;">

	 @if($sAction == "AddNewData")
	    <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
	  @elseif($sAction == "ViewData")
	    <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{$ProductTitle}} </div>
	  @else
	    <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$ProductTitle}} </div>
	  @endif

     @if($sAction != "ViewData")
      <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple; font-family: Arial, Helvetica, sans-serif;"> 

      
      </div>
     @endif

        @if($sAction == "AddNewData" || $sAction == "EditData")
        
          @if($sAction == "AddNewData")
          
           {!!   $ProductId                 = '' !!}
           {!!   $UserId                    = '' !!}
           {!!   $StockCategoriesId         = '' !!}
           {!!   $SubCategoryId             = '' !!}
           {!!   $ProductTitle              = '' !!}
           {!!   $ProductDescription        = '' !!}
           {!!   $ProductPrice              = '' !!}
           {!!   $ProductDiscount           = '' !!}
           {!!   $ProductPriceAfterDiscount = '' !!}
           {!!   $InStock                   = '' !!}
           {!!   $Printing                  = '' !!}
           {!!   $Size                      = '' !!}
           {!!   $Sides                     = '' !!}
           {!!   $Colors                    = '' !!}
           {!!   $Material                  = '' !!}
           {!!   $QuantityFrom              = '' !!}
           {!!   $Finishing                 = '' !!}
           {!!   $ProductionWithin          = '' !!}
           {!!   $Limitations               = '' !!}
           {!!   $ProductStatus             = '' !!}
           {!!   $CreatedOn                 = '' !!}
           {!!   $UpdatedOn                 = '' !!}

          @endif

        @if($sAction == "AddNewData")
        <?php
          $AllData = array('Colors' => 1);
          $ProductImages = array();
        ?>
        @endif

         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'up/Products','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $ProductId }}">
        @else
        {!! Form::open(array('url'=>'up/Products','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="0">
        @endif
        {!! csrf_field() !!}
        
          <div class="row">

            <div class="alert alert-info" role="alert" id="errmsg" style="display: none;">
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Category:</label>

                  <select id="category" name="category" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%" onchange="getSubCategoryList(this.value);">
                      <option value='0'> - </option>
                      @foreach($aCategoriesList as $index=>$val)
                        <option {{ ($StockCategoriesId == $val->StockCategoriesId ? "selected": "")  }} value=' {{ $val->StockCategoriesId }} '> {{ $val->StockCategoriesTitle }} </option>
                      @endforeach
                  </select>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Sub Category:</label>

                  <select id="sc" name="sc" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%">
                      <option value='0' id='0'> - </option>
                      @if($sAction == "EditData")

                        @foreach($SubCategoryList as $index=>$val)
                        <option {{ ($StockSubCategoriesId == $val->StockSubCategoriesId ? "selected": "")  }} value='{{$val->StockSubCategoriesId}}'>{{$val->StockSubCategoriesTitle}}</option>
                        @endforeach

                      @endif
                  </select>

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Product Title:</label>

                  <input type="text" name="ProductTitle" id="ProductTitle" placeholder="Product Title" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $ProductTitle }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Product Description:</label>

                  <input type="text" name="ProductDescription" id="ProductDescription" placeholder="Product Description" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['ProductDescription'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Product Price:</label>

                  <input type="text" name="ProductPrice" id="ProductPrice" placeholder="ProductPrice" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['ProductPrice'] ?? '' }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Product Discount %:</label>

                  <input type="text" name="ProductDiscount" id="ProductDiscount" placeholder="Product Discount" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['ProductDiscount'] ?? '' }}" onchange="SetPrice(this.value);" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Product PriceAfter Discount:</label>

                  <input type="text" name="ProductPriceAfterDiscount" id="ProductPriceAfterDiscount" placeholder="Product Price After Discount" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['ProductPriceAfterDiscount'] ?? '' }}" readonly="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">In Stock:</label>

                  <input type="text" name="InStock" id="InStock" placeholder="In Stock" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['InStock'] ?? '' }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Printing:</label>

                  <input type="text" name="Printing" id="Printing" placeholder="Printing" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Printing'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Size:</label>

                  <input type="text" name="Size" id="Size" placeholder="Size" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Size'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Sides:</label>

                  <input type="text" name="Sides" id="Sides" placeholder="Sides" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Sides'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Colors:</label>

                  <!-- <input type="text" name="Colors" id="Colors" placeholder="Colors" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Colors'] ?? '' }}"> -->
                  <br />
                  <select class="dropdown-select" data-style="btn-sm bg-white font-weight-normal py-2 border" name="Colors" id="Colors" style="height: 40px; width: 180px; border: 1px solid #87ceeb !important; padding: 6px;">
                      <option {{ ($AllData['Colors'] == 1 ? "selected": "")  }} value="1">White with Gold</option>
                      <option {{ ($AllData['Colors'] == 2 ? "selected": "")  }} value="2">Red</option>
                      <option {{ ($AllData['Colors'] == 3 ? "selected": "")  }} value="3">Green</option>
                      <option {{ ($AllData['Colors'] == 4 ? "selected": "")  }} value="4">Blue</option>
                      <option {{ ($AllData['Colors'] == 5 ? "selected": "")  }} value="5">CMYK</option>
                      <option {{ ($AllData['Colors'] == 6 ? "selected": "")  }} value="5">Black & White</option>
                  </select>

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Material:</label>

                  <input type="text" name="Material" id="Material" placeholder="Material" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Material'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">QuantityFrom:</label>

                  <input type="text" name="QuantityFrom" id="QuantityFrom" placeholder="QuantityFrom" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['QuantityFrom'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Finishing:</label>

                  <input type="text" name="Finishing" id="Finishing" placeholder="QuantityFrom" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Finishing'] ?? '' }}">

                </div>
                  
            </div>

            <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Production Within:</label>

                  <input type="text" name="ProductionWithin" id="ProductionWithin" placeholder="ProductionWithin" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['ProductionWithin'] ?? '' }}">

                </div>
                  
            </div>

           <!--  <div class="col-md-12" id="amountinrupees">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Limitations:</label>

                  <input type="text" name="Limitations" id="Limitations" placeholder="Limitations" class="form-control input-md input-xs GoSoftFinancialsForm" value="{{ $AllData['Limitations'] ?? '' }}">

                </div>
                  
            </div> -->

            <div class="col-md-12" id="amountinrupees">
                @if($sAction == "EditData")
                <div class="form-group">

                  <label for="placement" class="control-label">Images:</label>

                  <input type="file" id="Images" name="Images[]" placeholder="Images" class="form-control input-md input-xs GoSoftFinancialsForm" multiple>

                </div>
                @else
                <div class="form-group">

                  <label for="placement" class="control-label required">Images:</label>

                  <input type="file" id="Images" name="Images[]" placeholder="Images" class="form-control input-md input-xs GoSoftFinancialsForm" multiple>

                </div>
                @endif
                  
            </div>

            <h1>Product Images</h1>
              <div class="gallery cf">
                @foreach($ProductImages as $sImage)
              <div>
                <img src="{{ asset('public/assets/images/products/'.$sImage['ProductImageTitle']) }}" />
              </div>
              @endforeach
            </div>

          
           <div class="form-group form-actions" style="margin-top: 14px;">
               
              <div class="col-md-8 col-md-offset-4">
	              @if($sAction == "AddNewData")
	              	<button type="button" id="ActionButton" name="ActionButton" class="button button-rounded button-highlight-flat hvr-pop">
	              Add
	              	</button>
	              @else
	              	<button type="submit" id="ActionButtonEdit" name="ActionButtonEdit" class="button button-rounded button-highlight-flat hvr-pop">Update</button>
	              @endif
              </div>
               
            </div>

        {!! Form::close() !!}
                  
   
     @elseif($sAction == "ViewData")
      <table class="CustomeTable">
          <tr>
              <td> CategoryName </td><td> {{ $CategoryName }} </td>
          </tr>
          
          <tr>
              <td> SubCategoryName: </td><td> {{ $SubCategoryName }} </td>
          </tr>

          <tr>
              <td> ProductTitle: </td><td> {{ $ProductTitle }} </td>
          </tr>

          <tr>
              <td> ProductDescription: </td><td> {{ $ProductDescription }} </td>
          </tr>

          <tr>
              <td> ProductPriceAfterDiscount: </td><td> {{ $ProductPriceAfterDiscount }} </td>
          </tr>

          <tr>
              <td> InStock: </td><td> {{ $InStock }} </td>
          </tr>
      </table>
        <h1>Product Images</h1>
          <div class="gallery cf">
            @foreach($ProductImages as $sImage)
        <div>
          <img src="{{ asset('public/assets/images/products/'.$sImage['ProductImageTitle']) }}" />
        </div>
        @endforeach
      </div>
      
     
       @endif
     
     </div>

                                           
  </div>
      
<script>

function EarningRate(iEarningRate)
{
  if(iEarningRate == 1)
  {
    $('#1by4').attr('checked', false); // Unchecks it
    $('#salary').attr('checked', false); // Unchecks it
    $('#daily').attr('checked', false); // Unchecks it
    $('#amountinrupees').fadeOut(800);
  }else if(iEarningRate == 2)
  {
    $('#1by2').attr('checked', false); // Unchecks it
    $('#salary').attr('checked', false); // Unchecks it
    $('#daily').attr('checked', false); // Unchecks it
    $('#amountinrupees').fadeOut(800);
  }else if(iEarningRate == 3)
  {
    $('#1by2').attr('checked', false); // Unchecks it
    $('#1by4').attr('checked', false); // Unchecks it
    $('#daily').attr('checked', false); // Unchecks it
    $('#amountinrupees').fadeIn(800);
  }
}

function getSubCategoryList(iCategoryId)
{
  if(iCategoryId > 0)
  {
    sData = "iCategoryId="+iCategoryId+'&_token='+$('input[name=_token]').val();
    AjaxFillList('getSubCategory', sData, 'sc');
  }
}

function getWorkerList(iLocationId)
{
  sData = "iLocationId="+iLocationId+'&_token='+$('input[name=_token]').val();
  AjaxFillList('getWorker', sData, 'wname');

  SetValue(0);
}

</script>

<script>
$("#ActionButton").click(function ()
{
  $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
  $("#ActionButton").attr("disabled", true);

  if($('#ProductTitle').val())
  {  
    let aFormData = new FormData();

    let sc = $('#sc').val();
    let ProductTitle = $('#ProductTitle').val();
    let ProductDescription = $('#ProductDescription').val();
    let ProductPrice = $('#ProductPrice').val();
    let ProductDiscount = $('#ProductDiscount').val();
    let ProductPriceAfterDiscount = $('#ProductPriceAfterDiscount').val();
    let InStock = $('#InStock').val();
    let Printing = $('#Printing').val();
    let Size = $('#Size').val();
    let Sides = $('#Sides').val();
    let Colors = $('#Colors').val();
    let Material = $('#Material').val();
    let QuantityFrom = $('#QuantityFrom').val();
    let Finishing = $('#Finishing').val();
    let ProductionWithin = $('#ProductionWithin').val();
    let Limitations = "-";

    aFormData.append('_token', '{{csrf_token()}}');
    aFormData.append('sc', sc);
    aFormData.append('ProductTitle', ProductTitle);
    aFormData.append('ProductDescription', ProductDescription);
    aFormData.append('ProductPrice', ProductPrice);
    aFormData.append('ProductDiscount', ProductDiscount);
    aFormData.append('ProductPriceAfterDiscount', ProductPriceAfterDiscount);
    aFormData.append('InStock', InStock);
    aFormData.append('Printing', Printing);
    aFormData.append('Size', Size);
    aFormData.append('Sides', Sides);
    aFormData.append('Colors', Colors);
    aFormData.append('Material', Material);
    aFormData.append('QuantityFrom', QuantityFrom);
    aFormData.append('Finishing', Finishing);
    aFormData.append('ProductionWithin', ProductionWithin);
    aFormData.append('Limitations', Limitations);

    let TotalImages = $('#Images')[0].files.length; 
    if(TotalImages <= 0)
    {
        $("#errmsg").html("");
        $("#errmsg").fadeIn();
        $("#errmsg").html("Upload Product Images!");

        $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

        $("#LoaderIcon").remove();
        $("#ActionButton").removeAttr("disabled");

        return false;
    }

    let images = $('#Images')[0]; 
    for (let i = 0; i < TotalImages; i++) {
        aFormData.append('Images[]', images.files[i]);
    }

    aFormData.append('TotalImages', TotalImages);
   
      $.ajax({
           type: 'post',
           url: 'Products',
           data: aFormData,
           contentType: false,
           processData: false,
         success : function (msg)
         {
           var aMessage = msg.split("|");
          
           key = aMessage[0];
           
           sMessage = aMessage[1];

           iRecordId = aMessage[2];

            if(key == "success")
            {
              $("#errmsg").html("");
              $("#errmsg").fadeIn();
              $("#errmsg").html(sMessage);

              $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");
              $("#form-validation").reset();
            }else
            {
              $("#errmsg").html("");
              $("#errmsg").fadeIn();
              $("#errmsg").html(sMessage);

              $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");
            }

         },
        }); //ajax close
      
    }
    else
    {

        $("#errmsg").html("");
        $("#errmsg").fadeIn();
        $("#errmsg").html("Add Product Title..!");

        $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

        $("#LoaderIcon").remove();
        $("#ActionButton").removeAttr("disabled");

        return false;
    }
   
});
</script>

<script>
$("#ActionButtonEdit").click(function ()
{
  $("#ActionButtonEdit").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
  $("#ActionButtonEdit").attr("disabled", true);

  if($('#ProductTitle').val())
  {  
    let aFormData = new FormData();

    let sc = $('#sc').val();
    let ProductTitle = $('#ProductTitle').val();
    let ProductDescription = $('#ProductDescription').val();
    let ProductPrice = $('#ProductPrice').val();
    let ProductDiscount = $('#ProductDiscount').val();
    let ProductPriceAfterDiscount = $('#ProductPriceAfterDiscount').val();
    let InStock = $('#InStock').val();
    let Printing = $('#Printing').val();
    let Size = $('#Size').val();
    let Sides = $('#Sides').val();
    let Colors = $('#Colors').val();
    let Material = $('#Material').val();
    let QuantityFrom = $('#QuantityFrom').val();
    let Finishing = $('#Finishing').val();
    let ProductionWithin = $('#ProductionWithin').val();
    let Limitations = $('#Limitations').val();

    aFormData.append('_token', '{{csrf_token()}}');
    aFormData.append('_method', 'PATCH');
    aFormData.append('sc', sc);
    aFormData.append('ProductTitle', ProductTitle);
    aFormData.append('ProductDescription', ProductDescription);
    aFormData.append('ProductPrice', ProductPrice);
    aFormData.append('ProductDiscount', ProductDiscount);
    aFormData.append('ProductPriceAfterDiscount', ProductPriceAfterDiscount);
    aFormData.append('InStock', InStock);
    aFormData.append('Printing', Printing);
    aFormData.append('Size', Size);
    aFormData.append('Sides', Sides);
    aFormData.append('Colors', Colors);
    aFormData.append('Material', Material);
    aFormData.append('QuantityFrom', QuantityFrom);
    aFormData.append('Finishing', Finishing);
    aFormData.append('ProductionWithin', ProductionWithin);
    aFormData.append('Limitations', Limitations);

    let TotalImages = $('#Images')[0].files.length; 

    if(TotalImages > 0)
    {
      let images = $('#Images')[0]; 
      for (let i = 0; i < TotalImages; i++) {
          aFormData.append('Images[]', images.files[i]);
      }

      aFormData.append('TotalImages', TotalImages);
    }

      var iId = $('#hiddenVal').val();
      route = 'Products';

      $.ajax({
           type: 'post',
           url: 'Products/'+iId,
           data: aFormData,
           contentType: false,
           processData: false,
         success : function (msg)
         {
           var aMessage = msg.split("|");
          
           key = aMessage[0];
           
           sMessage = aMessage[1];

           iRecordId = aMessage[2];

            if(key == "success")
            {
              AjaxPage(route+'/'+iId, 'DivMainContainer');

              $("#errmsg").html("");
              $("#errmsg").fadeIn();
              $("#errmsg").html(sMessage);

              $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

              $("#LoaderIcon").remove();
              $("#ActionButtonEdit").removeAttr("disabled");
              $("#form-validation").reset();

              
                

            }else
            {
              $("#errmsg").html("");
              $("#errmsg").fadeIn();
              $("#errmsg").html(sMessage);

              $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

              $("#LoaderIcon").remove();
              $("#ActionButtonEdit").removeAttr("disabled");
            }

         },
        }); //ajax close
      
    }
    else
    {

        $("#errmsg").html("");
        $("#errmsg").fadeIn();
        $("#errmsg").html("Add Product Title..!");

        $('html, body').animate({ scrollTop: $('#panel').offset().top }, 'slow');

        $("#LoaderIcon").remove();
        $("#ActionButtonEdit").removeAttr("disabled");

        return false;
    }
   
});
</script>

<script type="text/javascript">
  function SetPrice(dPriceDiscount)
  {

    ProductPrice = $("#ProductPrice").val();
    var dTotalDiscount = (dPriceDiscount/100*ProductPrice);
    ProductPrice = (ProductPrice-dTotalDiscount);

    $("#ProductPriceAfterDiscount").val(ProductPrice);

  }
</script>

@stop