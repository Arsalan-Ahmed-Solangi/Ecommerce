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

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Administration/Workers/fa-unlock-alt/fa-male', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{$WorkerUserName}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$WorkerUserName}} </div>
      @endif

      @if($sAction == "AddNewData")
      <div style="font-size: 18px; font-weight: bold; text-align: center; margin-top: 12px; color: purple; font-family: Arial, Helvetica, sans-serif;"> <span id="workerusername"></span> </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">

        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $WorkerId            = '' !!}
         {!!   $WorkerName          = '' !!}
         {!!   $WorkerContactNumber = '' !!}
         {!!   $WorkerStatus        = '' !!}
         {!!   $CreatedOn           = '' !!}
         {!!   $CreatedBy           = '' !!}
         {!!   $UpdatedOn           = '' !!}
         {!!   $TownId              = '' !!}
         {!!   $WorkerStatus        = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'Workers','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
        
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $WorkerId }}">
        @else
        {!! Form::open(array('url'=>'Workers','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}

        <input type="hidden" name="hiddenVal" id="hiddenVal" value="0">
        <input type="hidden" name="wuname" id="wuname" value>

        @endif
        {!! csrf_field() !!}
        
          <div class="row">


            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Select Town:</label>

                  <select id="town" name="town" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%" onchange="getLocationList(this.value);">
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


                  <label for="placement" class="control-label required">Worker Name:</label>

                  <input type="text" name="wname" id="wname" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="Worker Name" value="{{$WorkerName}}">

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label">Worker Contact Number:</label>

                  <input type="text" name="wcn" id="wcn" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="Worker Contact Number" value="{{ $WorkerContactNumber }}" onblur="CheckDuplicate(this.value, 'WorkerContactNumber', 'Workers', 'winfo', 'number', $('#hiddenVal').val())" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                  
                  <small class="help-block" data-bv-validator="WorkerContactNumber" data-bv-for="wcn" data-bv-result="INVALID" style="display: none;" id="winfo"></small>

                </div>
                  
            </div>
          
                                                    
          <div class="col-md-12">
              
              <div class="form-group">

                <label for="placement" class="control-label">
                  Status:
                </label>

                <select id="status" name="status" class="form-control select21 GoSoftFinancialsForm">
                  @if($sAction == "EditData")
                  <option {{ ($WorkerStatus == 1 ? "selected": "")  }} value="1">Active</option>
                  <option {{ ($WorkerStatus == 0 ? "selected": "")  }} value="0">InActive</option>
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


            <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Designation</h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(array('url'=>'UserDesignation','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
                  <div class="panel-body center-block" style="max-width: 70%;">
                    <div class="col-md-12">
                
                      <div class="form-group">

                        <label for="placement" class="control-label required">Designation:</label>

                        <input type="text" name="designation" id="designation" class="form-control input-md input-xs" placeholder="User Designation" required="">

                      </div>
                        
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="placement" class="control-label">
                          Status:
                        </label>
                        <select id="dstatus" name="dstatus" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%">
                          <option value="1">Active</option>
                          <option value="0">InActive</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group form-actions">
               
                      <div class="col-md-8 col-md-offset-4">
                        <button type="button" id="ActionButtonAddUserDesignation" name="ActionButtonAddUserDesignation" class="button button-rounded button-highlight-flat hvr-pop">
                        Add
                        </button>
                      </div>
                     
                    </div>

                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>

        {!! Form::close() !!}
                  
   
     @elseif($sAction == "ViewData")
      
     
      
      <table class="CustomeTable">
          <tr>
              <td> Town: </td><td> {{ $TownName }} </td>
          </tr>

          <tr>
              <td> Location: </td><td> {{ $LocationTitle }} </td>
          </tr>

          <tr>
              <td> Worker User Name </td><td> {{ $WorkerUserName }} </td>
          </tr>

          <tr>
              <td> Worker Name </td><td> {{ $WorkerName }} </td>
          </tr>

          <tr>
              <td> Worker Contact Number </td><td> {{ $WorkerContactNumber }} </td>
          </tr>

          <tr>
              <td> Worker Status: </td><td> {{ $WorkerStatus }} </td>
          </tr>

          <tr>
              <td> Added By: </td><td> {{ $CreatedBy }} </td>
          </tr>
          
          <tr>
              <td> Created On: </td><td> {{ date("F j, Y", strtotime($WorkerCreatedOn)) . ' at ' . date("g:i a", strtotime($WorkerCreatedOn)) }} </td>
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
    getSystemCode(iTownId);
  
    sData = "iTownId="+iTownId+'&_token='+$('input[name=_token]').val();
    AjaxFillList('getLocations', sData, 'l');
  }
}

function getSystemCode(iTownId)
{
  $.ajax(
          {
           type: 'POST',
           url: 'getSystemCode',
           data:
            {
             '_token' : $('input[name=_token]').val(),
             'iTownId' : iTownId,
             'Component' : 'Workers'
            },
         success : function (msg)
         {
          $("#workerusername").html(msg);
          $("#wuname").val(msg);
         },
        }
      );
}

$(function()
{
  $("#ActionButton").click(function ()
  {
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if($("#winfo").html() != "")
    {
      $("#LoaderIcon").remove();
      $("#ActionButton").removeAttr("disabled");
      return false;
    }

    if($("#wname").val() && $("#town").val() > 0 && $("#l").val() > 0)
    {  
            ierror = 0;
            sUserContactNumber = $("#wcn").val();
            
          if(sUserContactNumber != "")
            {
              if(sUserContactNumber.length > 11 || sUserContactNumber.length < 11)
              {
                $("#winfo").parent().addClass('has-error');
                $("#winfo").html("number length should be 11");
                $("#winfo").css("display", "block");

                key = "warning";
                sMessage = "number length should be 11";

                ierror++;

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                return false;

              }else
              {
                $("#winfo").parent().removeClass('has-error');
                $("#winfo").parent().addClass('has-success');
                $("#winfo").css("display", "none");
                $("#winfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;
              }
            }else
            {
              $("#winfo").parent().removeClass('has-error');
              $("#winfo").css("display", "none");
              $("#winfo").empty();

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              ierror--;
            }

        if(ierror <= 0)
        {
          route = 'Workers';
          $.ajax({
               type: 'post',
               url: 'Workers',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'l' : $('#l').val(),
                   'wname' : $('#wname').val(),
                   'wcn' : $('#wcn').val(),
                   'wuname' : $('#wuname').val(),
                   'st' : $('#status').val()
                  },
             success : function (msg)
             {

               var aMessage = msg.split("|");
              
               key = aMessage[0];

               sMessage = aMessage[1];

               iWorkerId = aMessage[2];

               if(sMessage == "user full name contains sepecial characters")
               {
                  $("#ufninfo").parent().addClass('has-error');
                  $("#ufninfo").html("user full name contains sepecial characters");
                  $("#ufninfo").css("display", "block");

                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");
                }

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
                  AjaxPage(route+'/'+iWorkerId, 'DivMainContainer');
                }

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

             },
            }); //ajax close
        }
        
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

$(function()
{
  $("#ActionButtonEdit").click(function ()
  {
    $("#ActionButtonEdit").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButtonEdit").attr("disabled", true);

    if($("#winfo").html() != "")
    {
      $("#LoaderIcon").remove();
      $("#ActionButtonEdit").removeAttr("disabled");
      return false;
    }

    if($("#wname").val() && $("#town").val() && $("#l").val() > 0)
    {  
            ierror = 0;
            sUserContactNumber = $("#wcn").val();
            
          if(sUserContactNumber != "")
            {
              if(sUserContactNumber.length > 11 || sUserContactNumber.length < 11)
              {
                $("#winfo").parent().addClass('has-error');
                $("#winfo").html("number length should be 11");
                $("#winfo").css("display", "block");

                key = "warning";
                sMessage = "number length should be 11";

                ierror++;

                $("#LoaderIcon").remove();
                $("#ActionButtonEdit").removeAttr("disabled");

                return false;

              }else
              {
                $("#winfo").parent().removeClass('has-error');
                $("#winfo").parent().addClass('has-success');
                $("#winfo").css("display", "none");
                $("#winfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButtonEdit").removeAttr("disabled");

                ierror--;
              }
            }else
            {
              $("#winfo").parent().removeClass('has-error');
              $("#winfo").css("display", "none");
              $("#winfo").empty();

              $("#LoaderIcon").remove();
              $("#ActionButtonEdit").removeAttr("disabled");

              ierror--;
            }

        if(ierror <= 0)
        {
              var iId = $('#hiddenVal').val();
              route = 'Workers';
              $.ajax(
              {
                 type: 'PATCH',
                 url: 'Workers/'+iId,
                 data: {
                   '_token' : $('input[name=_token]').val(),
                   'l' : $('#l').val(),
                   'wname' : $('#wname').val(),
                   'wcn' : $('#wcn').val(),
                   'wuname' : $('#wuname').val(),
                   'st' : $('#status').val()
                  },
             success : function (msg)
             {

               var aMessage = msg.split("|");
              
               key = aMessage[0];

               sMessage = aMessage[1];

               if(sMessage == "user full name contains sepecial characters")
               {
                  $("#ufninfo").parent().addClass('has-error');
                  $("#ufninfo").html("user full name contains sepecial characters");
                  $("#ufninfo").css("display", "block");

                  $("#LoaderIcon").remove();
                  $("#ActionButtonEdit").removeAttr("disabled");
                }

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
});

</script>

@stop