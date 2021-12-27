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

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Administration/Towns/fa-unlock-alt/fa-home', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;">View {{$TownName}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$TownName}} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $TownId        = '' !!}
         {!!   $TownName      = '' !!}
         {!!   $TownStatus    = '' !!}
         {!!   $TownCreatedBy = '' !!}
         {!!   $TownCreatedOn = '' !!}
         {!!   $TownUpdatedOn = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'Towns','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
          <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{$TownId}}">
        @else
        {!! Form::open(array('url'=>'Towns','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        @endif
        {!! csrf_field() !!}
        
          <div class="row">

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Town Name:</label>

                  <input type="text" name="town" id="town" class="form-control input-sm GoSoftFinancialsForm" placeholder="Town" value="{{$TownName}}">

                </div>
                  
            </div>

                                                    
          <div class="col-md-12">
              
              
              <div class="form-group">

                <label for="placement" class="control-label">
                  Status:
                </label>

                <select id="st" name="st" class="form-control select21 input-sm" style="width:100%">
                  @if($sAction == "EditData")
                  <option {{ ($TownStatus == 1 ? "selected": "")  }} value="1">Active</option>
                  <option {{ ($TownStatus == 0 ? "selected": "")  }} value="0">InActive</option>
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
              <td> Town Name </td><td> {{ $TownName }} </td>
          </tr>
          
          <tr>
              <td> Status: </td><td> {{ $TownStatus }} </td>
          </tr>
          
          <tr>
              <td> Added By: </td><td> {{ $TownCreatedBy }} </td>
          </tr>
          
          <tr>
              <td> Added On: </td><td> {{ date("F j, Y", strtotime($TownCreatedOn)) . ' at ' . date("g:i a", strtotime($TownCreatedOn)) }} </td>
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

    if ($("#town").val())
    {  
        route = 'Towns';
        $.ajax({
               type: 'post',
               url: 'Towns',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'town' : $('#town').val(),
                   'st' : $('#st').val()
                  },
             success : function (msg)
             {
               var aMessage = msg.split("|");

               key = aMessage[0];

               sMessage = aMessage[1];

               iTownId = aMessage[2];

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
                  AjaxPage(route+'/'+iTownId, 'DivMainContainer');
                }

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");
                
             },
            });
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
    
$('#ActionButtonEdit').click(function()
{
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if ($("#town").val()) 
    {
        var iId = $('#hiddenVal').val();
        
        route = 'Towns';
        $.ajax(
        {
         type: 'PATCH',
         url: 'Towns/'+iId,
         data:
         {
             '_token' : $('input[name=_token]').val(),
             'town' : $('#town').val(),
             'st' : $('#st').val()
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
                $("#ActionButton").removeAttr("disabled");
                
             },
            });
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
    
</script>

@stop
