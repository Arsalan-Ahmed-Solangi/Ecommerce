@extends('barabrAdminDashboard/layouts/forms')

@section('formcontent')
<style type="text/css">
  #parent {
  display: flex;
}
#narrow {
  background: lightblue;
  /* Just so it's visible */
}
#wide {
  
  /* Grow to rest of container */
  background: lightblue;
  /* Just so it's visible */
}

/*ImageGallary*/
@import url('https://fonts.googleapis.com/css?family=Open+Sans:300');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
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
<div class="panel panel-primary" id="top">

    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-fw fa-star-half-empty"></i>
            Review Product
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/BarabrSystemAdmin/PublishProducts/fa-product-hunt/fa-product-hunt', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

 
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Review Products </div>
      
    
     <div class="panel-body center-block" style="max-width: 70%;">
      <div class="alert alert-success" role="alert" id="alert" style="display: none;">
      </div>
      
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

     
      @if($PublishStatus == 0)
      <button type="button" id="ActionButton" name="ActionButton" class="btn btn-primary" style="padding: 14px; width: 300px;" onclick="PublishUpNow('{{ $ProductId }}',1);"><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color: white;"></i> &nbsp; <b style="color: white;">Publish</b> </button>
      @else
      <button type="button" id="ActionButton" name="ActionButton" class="btn btn-primary" style="padding: 14px; width: 300px;" onclick="PublishUpNow('{{ $ProductId }}',0);"><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color: white;"></i> &nbsp; <b style="color: white;">Withhold</b> </button>
      @endif
      
     
     </div>

                                           
  </div>

<script>
    
function PublishUpNow(id, no)
{

    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

        $.ajax(
        {
         type: 'GET',
         url: 'PublishNow',
         data:
         {
             'ProductId' : id,
             'no' : no
         },
         success : function (msg)
             {
              
               var aMessage = msg.split("|");

               key = aMessage[0];

               sMessage = aMessage[1];

               if(key == "success")
               {
                  $("#LoaderIcon").remove();

                  $("#alert").html("");
                  $("#alert").fadeIn();
                  $("#alert").html(sMessage);

                  $("#forgotbtn").attr("disabled", false);
                  $('html, body').animate({ scrollTop: $('#top').offset().top }, 'slow');
                  return false;
               }else
               {
                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");

                  $("#alert").html("");
                  $("#alert").fadeIn();
                  $("#alert").html("some thing went wrong can not publish right now");

                  $("#forgotbtn").attr("disabled", false);
                  $('html, body').animate({ scrollTop: $('#alert').offset().top }, 'slow');
                  return false;
               }
                
                
             },
            });
    
  

};
    
</script>

@stop
