@extends('barabrUserDashboard/layouts/forms')

@section('formcontent')
<div class="panel panel-primary">

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

  </style>

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/StockManagements/Stocks/fa-balance-scale/fa-codepen', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{ $sTitle }} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{ $sTitle }} </div>
      @endif


     <div class="panel-body center-block" style="max-width: 70%;">

        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $StockId                  = '' !!}
         {!!   $TownId                   = '' !!}
         {!!   $StockCategoriesId        = '' !!}
         {!!   $StockSubCategoriesId     = '' !!}
         {!!   $StockCategoriesTitle     = '' !!}
         {!!   $StockSubCategoriesTitle  = '' !!}
         {!!   $StockStatus              = '' !!}
         {!!   $StockQuantity            = '' !!}
         {!!   $StockPrice               = '' !!}
         {!!   $StockNote                = '' !!}
         {!!   $CreatedOn                = '' !!}
         {!!   $CreatedBy                = '' !!}
         {!!   $UpdatedOn                = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'Stocks','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
        <?php $sDisabled = "disabled"; ?>
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $StockId }}">
        @else
        {!! Form::open(array('url'=>'Stocks','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}

        <input type="hidden" name="hiddenVal" id="hiddenVal" value="0">

        @endif
        {!! csrf_field() !!}
        
          <div class="row">


            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Town:</label>

                  <select id="t" name="t" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%" onchange="getLocationList(this.value);">

                      <option value='0'> - </option>
                      @foreach($TownsList as $index=>$val)
                        <option {{ ($TownId == $val->TownId ? "selected": "")  }} value='{{ $val->TownId }}'> {{ $val->TownName }} </option>
                      @endforeach

                  </select>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Location:</label>

                  <select id="l" name="l" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%">
                      <option value='0' id='0'> - </option>
                      @if($sAction == "EditData")

                        @foreach($LocationList as $index=>$val)
                        <option {{ ($LocationId == $val->LocationId ? "selected": "")  }} value='{{$val->LocationId}}' id="{{$val->LocationId}}">{{$val->LocationTitle}}</option>
                        @endforeach

                      @endif
                  </select>

                </div>
                  
          </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Category:</label>

                  <select id="c" name="c" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%" onchange="getSubCategoryList(this.value);">

                      <option value='0'> - </option>
                      @foreach($CategoriesList as $index=>$val)
                        <option {{ ($StockCategoriesId == $val->StockCategoriesId ? "selected": "")  }} value='{{ $val->StockCategoriesId }}'> {{ $val->StockCategoriesTitle }} </option>
                      @endforeach

                  </select>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Sub Category:</label>

                  <select id="sc" name="sc" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%">
                      <option value='0' id='0'> - </option>
                      @if($sAction == "EditData")

                        @foreach($SubCategoriesList as $index=>$val)
                        <option {{ ($StockSubCategoriesId == $val->StockSubCategoriesId ? "selected": "")  }} value='{{$val->StockSubCategoriesId}}' id="{{$val->StockSubCategoriesId}}">{{$val->StockSubCategoriesTitle}}</option>
                        @endforeach

                      @endif
                  </select>

                </div>
                  
            </div>

          <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Quantity:</label>

                  <input type="number" name="sq" id="sq" placeholder="Quantity in Number" class="form-control input-md input-xs GoSoftFinancialsForm" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ $StockQuantity }}" min="0">

                </div>
                  
            </div>


            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Price:</label>

                  <input type="number" name="p" id="p" placeholder="Price" class="form-control input-md input-xs GoSoftFinancialsForm" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{ $StockPrice }}" min="0">

                </div>
                  
            </div>
                                                    
          <div class="col-md-12">
              
              <div class="form-group">

                <label for="placement" class="control-label">
                  Status:
                </label>

                <select id="status" name="status" class="form-control select21 GoSoftFinancialsForm">
                  @if($sAction == "EditData")
                  <option {{ ($StockStatus == 1 ? "selected": "")  }} value="1">Active</option>
                  <option {{ ($StockStatus == 0 ? "selected": "")  }} value="0">InActive</option>
                  @else
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
                  @endif
                </select>
              </div>
          
          </div>

          <div class="col-md-12">
                  
              <div class="form-group">
                      
                  <label for="placement" class="control-label">
                      Note:
                  </label>

                  <textarea id="note" name="note" rows="3"
                  class="form-control resize_vertical GoSoftFinancialsForm"
                  placeholder="Note">{{$StockNote}}</textarea>
              
              </div>
              
            </div>
            

            <div class="form-group form-actions">
               
              <div class="col-md-8 col-md-offset-4">
              @if($sAction == "AddNewData")
              <button type="button" id="ActionButton" name="ActionButton" class="button button-rounded button-highlight-flat hvr-pop">
              Add
              </button>
              @else
              <button type="button" id="ActionButtonEdit" name="ActionButtonEdit" class="button button-rounded button-highlight-flat hvr-pop">Edit</button>
              @endif
              <!-- <button type="reset" class="button button-rounded btn btn-default" style="margin-top: 10px;">Reset</button> -->
              </div>
               
            </div>

        {!! Form::close() !!}
                  
   
     @elseif($sAction == "ViewData")
      
     
      
      <table class="CustomeTable">

          <tr>
              <td> Town </td><td> {{ $TownName }} </td>
          </tr>

          <tr>
              <td> Location </td><td> {{ $LocationTitle }} </td>
          </tr>

          <tr>
              <td> Category </td><td> {{ $StockCategoriesTitle }} </td>
          </tr>

          <tr>
              <td> Sub Category </td><td> {{ $StockSubCategoriesTitle }} </td>
          </tr>

          <tr>
              <td> Stock Quantity </td><td> {{ $StockQuantity }} </td>
          </tr>

          <tr>
              <td> Price </td><td> {{ $StockPrice }} </td>
          </tr>

          <tr>
              <td> Status: </td><td> {{ $StockStatus }} </td>
          </tr>

           <tr>
              <td> Note </td><td> {{ $StockNote }} </td>
          </tr>
          
          <tr>
              <td> Added By: </td><td> {{ $CreatedBy }} </td>
          </tr>
          
          <tr>
              <td> Created On: </td><td> {{ date("F j, Y", strtotime($CreatedOn)) . ' at ' . date("g:i a", strtotime($CreatedOn)) }} </td>
          </tr>
          
      </table>
      
     
       @endif
     
     </div>

                                           
  </div>
      
<script>

function getLocationList(iTownId)
{
  if(iTownId > 0)
  {
    sData = "iTownId="+iTownId+'&_token='+$('input[name=_token]').val();
    AjaxFillList('getLocations', sData, 'l');
  }
}

function getSubCategoryList(iCategoryId)
{
  sData = "iCategoryId="+iCategoryId+'&_token='+$('input[name=_token]').val();
  AjaxFillList('getSubCategories', sData, 'sc');
}

$(function()
{
  $("#ActionButton").click(function ()
  {
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if($("#c").val() && $("#c").val() > 0 && $("#sc").val() && $("#sc").val() > 0 && $("#sq").val() && $("#p").val() && $("#l").val() > 0)
    {  
        route = 'Stocks';
        $.ajax({
             type: 'post',
             url: 'Stocks',
             data: {
                 '_token' : $('input[name=_token]').val(),
                 'l' : $('#l').val(),
                 'c' : $('#c').val(),
                 'sc' : $('#sc').val(),
                 'sq' : $('#sq').val(),
                 'p' : $('#p').val(),
                 'note' : $('#note').val(),
                 'st' : $('#status').val()
                },
           success : function (msg)
           {

             var aMessage = msg.split("|");
            
             key = aMessage[0];

             sMessage = aMessage[1];

             iRecordId = aMessage[2];

              toastr[key](sMessage, "Barabr Alert")

              toastr.options = 
              {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "timeOut": "6000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }

              if(key == "success")
              {
                AjaxPage(route+'/'+iRecordId, 'DivMainContainer');
              }

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

           },
          }); //ajax close
        
      }
      else
      {

          toastr["error"]("fill in all the red star fields", "Barabr Alert")

          toastr.options =
          {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "6000",
            "showEasing": "swing",
            "hideEasing": "swing",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }

          $("#LoaderIcon").remove();
          $("#ActionButton").removeAttr("disabled");

          return false;
      }
     
  });
});
</script>


<script>

$("#ActionButtonEdit").click(function ()
{
$("#ActionButtonEdit").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
$("#ActionButtonEdit").attr("disabled", true);

if($("#c").val() && $("#c").val() > 0 && $("#sc").val() && $("#sc").val() > 0 && $("#sq").val() && $("#p").val() && $("#l").val() > 0)
{  
      var iId = $('#hiddenVal').val();
      route = 'Stocks';
      $.ajax(
      {
         type: 'PATCH',
         url: 'Stocks/'+iId,
         data: {
           '_token' : $('input[name=_token]').val(),
           'l' : $('#l').val(),
           'c' : $('#c').val(),
           'sc' : $('#sc').val(),
           'sq' : $('#sq').val(),
           'p' : $('#p').val(),
           'note' : $('#note').val(),
           'st' : $('#status').val()
          },
     success : function (msg)
     {

       var aMessage = msg.split("|");
      
       key = aMessage[0];

       sMessage = aMessage[1];

        toastr[key](sMessage, "Barabr Alert")

        toastr.options = 
        {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "timeOut": "6000",
          "showEasing": "swing",
          "hideEasing": "swing",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

        if(key == "success")
        {
          AjaxPage(route+'/'+iId, 'DivMainContainer');
        }

        $("#LoaderIcon").remove();
        $("#ActionButtonEdit").removeAttr("disabled");

     },
    }); //ajax close
    
    
  }
  else
  {

      toastr["error"]("fill in all the red star fields", "Barabr Alert")

      toastr.options =
      {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "timeOut": "6000",
        "showEasing": "swing",
        "hideEasing": "swing",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      $("#LoaderIcon").remove();
      $("#ActionButtonEdit").removeAttr("disabled");

      return false;
  }
 
});
    
</script>

@stop