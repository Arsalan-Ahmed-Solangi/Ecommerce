@extends('baseraUserDashboard/layouts/forms')

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

     <div style="float: right; padding: 16px;"> <a href="#basera" onclick="AjaxPage('Pages/StockManagements/StockSubCategory/fa-balance-scale/fa-file-code-o', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{$StockSubCategoriesTitle}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$StockSubCategoriesTitle}} </div>
      @endif


     <div class="panel-body center-block" style="max-width: 70%;">

        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $StockSubCategoriesId     = '' !!}
         {!!   $StockCategoriesId        = '' !!}
         {!!   $StockSubCategoriesTitle  = '' !!}
         {!!   $StockSubCategoriesStatus = '' !!}
         {!!   $CreatedOn                = '' !!}
         {!!   $CreatedBy                = '' !!}
         {!!   $UpdatedOn                = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'StockSubCategory','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
        <?php $sDisabled = "disabled"; ?>
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $StockSubCategoriesId }}">
        @else
        {!! Form::open(array('url'=>'StockSubCategory','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}

        <input type="hidden" name="hiddenVal" id="hiddenVal" value="0">

        @endif
        {!! csrf_field() !!}
        
          <div class="row">


            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Category:</label>

                  <select id="c" name="c" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%">

                      <option value='0'> - </option>
                      @foreach($CategoriesList as $index=>$val)
                        <option {{ ($StockCategoriesId == $val->StockCategoriesId ? "selected": "")  }} value='{{ $val->StockCategoriesId }}'> {{ $val->StockCategoriesTitle }} </option>
                      @endforeach

                  </select>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Sub Category Title:</label>

                  <input type="text" name="sc" id="sc" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="Sub Category Title" value="{{$StockSubCategoriesTitle}}">

                </div>
                  
            </div>
                                                    
          <div class="col-md-12">
              
              <div class="form-group">

                <label for="placement" class="control-label">
                  Status:
                </label>

                <select id="status" name="status" class="form-control select21 GoSoftFinancialsForm">
                  @if($sAction == "EditData")
                  <option {{ ($StockSubCategoriesStatus == 1 ? "selected": "")  }} value="1">Active</option>
                  <option {{ ($StockSubCategoriesStatus == 0 ? "selected": "")  }} value="0">InActive</option>
                  @else
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
                  @endif
                </select>
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
              <td> Category </td><td> {{ $StockCategoriesTitle }} </td>
          </tr>

          <tr>
              <td> Sub Category </td><td> {{ $StockSubCategoriesTitle }} </td>
          </tr>

          <tr>
              <td> Status: </td><td> {{ $StockSubCategoriesStatus }} </td>
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

$(function()
{
  $("#ActionButton").click(function ()
  {
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if($("#c").val() && $("#c").val() > 0 && $("#sc").val())
    {  
        route = 'StockSubCategory';
        $.ajax({
             type: 'post',
             url: 'StockSubCategory',
             data: {
                 '_token' : $('input[name=_token]').val(),
                 'c' : $('#c').val(),
                 'sc' : $('#sc').val(),
                 'st' : $('#status').val()
                },
           success : function (msg)
           {

             var aMessage = msg.split("|");
            
             key = aMessage[0];

             sMessage = aMessage[1];

             iRecordId = aMessage[2];

              toastr[key](sMessage, "basera Alert")

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

          toastr["error"]("fill in all the red star fields", "basera Alert")

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

if($("#c").val() && $("#c").val() > 0 && $("#sc").val())
{  
      var iId = $('#hiddenVal').val();
      route = 'StockSubCategory';
      $.ajax(
      {
         type: 'PATCH',
         url: 'StockSubCategory/'+iId,
         data: {
           '_token' : $('input[name=_token]').val(),
           'c' : $('#c').val(),
           'sc' : $('#sc').val(),
           'st' : $('#status').val()
          },
     success : function (msg)
     {

       var aMessage = msg.split("|");
      
       key = aMessage[0];

       sMessage = aMessage[1];

        toastr[key](sMessage, "basera Alert")

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
      toastr["error"]("fill in all the red star fields", "basera Alert")

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