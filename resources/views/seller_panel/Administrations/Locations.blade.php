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
            Edit {{ $LocationTitle }}
            @endif
            @if($sAction == "ViewData")
            View {{ $LocationTitle }}
            @endif
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Administration/Locations/fa-unlock-alt/fa-location-arrow', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;">View {{$LocationTitle}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$LocationTitle}} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $TownId         = '' !!}
         {!!   $TownName       = '' !!}
         {!!   $LocationId     = '' !!}
         {!!   $LocationTitle  = '' !!}
         {!!   $LocationStatus = '' !!}
         {!!   $CreatedOn      = '' !!}
         {!!   $CreatedBy      = '' !!}
         {!!   $UpdatedOn      = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'Locations','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
          <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{$LocationId}}">
        @else
        {!! Form::open(array('url'=>'Locations','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        @endif
        {!! csrf_field() !!}
        
          <div class="row">

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Town:</label>

                  <select id="town" name="town" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%">
                      <option value='0'> - </option>
                      @foreach($TownList as $index=>$val)
                        <option {{ ($TownId == $val->TownId ? "selected": "")  }} value='{{ $val->TownId }}'> {{ $val->TownName }} </option>
                      @endforeach
                  </select>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Location:</label>

                  <input type="text" name="l" id="l" class="form-control input-sm GoSoftFinancialsForm" placeholder="Location" value="{{$LocationTitle}}">

                </div>
                  
            </div>

                                                    
          <div class="col-md-12">
              
              
              <div class="form-group">

                <label for="placement" class="control-label">
                  Status:
                </label>

                <select id="st" name="st" class="form-control select21 input-sm" style="width:100%">
                  @if($sAction == "EditData")
                  <option {{ ($LocationStatus == 1 ? "selected": "")  }} value="1">Active</option>
                  <option {{ ($LocationStatus == 0 ? "selected": "")  }} value="0">InActive</option>
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
              <td> Location Title </td><td> {{ $LocationTitle }} </td>
          </tr>
          
          <tr>
              <td> Status: </td><td> {{ $LocationStatus }} </td>
          </tr>
          
          <tr>
              <td> Added By: </td><td> {{ $CreatedBy }} </td>
          </tr>
          
          <tr>
              <td> Added On: </td><td> {{ date("F j, Y", strtotime($CreatedOn)) . ' at ' . date("g:i a", strtotime($CreatedOn)) }} </td>
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

    if ($("#town").val() > 0 && $("#l").val())
    {  
        route = 'Locations';
        $.ajax({
               type: 'post',
               url: 'Locations',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'town' : $('#town').val(),
                   'l' : $('#l').val(),
                   'st' : $('#st').val()
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

    if ($("#town").val() > 0 && $('#l').val()) 
    {
        var iId = $('#hiddenVal').val();
        
        route = 'Locations';
        $.ajax(
        {
         type: 'PATCH',
         url: 'Locations/'+iId,
         data: {
                   '_token' : $('input[name=_token]').val(),
                   'town' : $('#town').val(),
                   'l' : $('#l').val(),
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
