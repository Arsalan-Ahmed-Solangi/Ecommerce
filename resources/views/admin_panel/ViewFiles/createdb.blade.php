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

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/BarabrSystemAdmin/SystemMasterUserDB/fa-user-plus/fa-database', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;">View {{$DatabaseName}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$DatabaseName}} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!! $MasterUserId     = '' !!}
         {!! $DatabaseType     = '' !!}
         {!! $DatabasePort     = '' !!}
         {!! $DatabaseHost     = '' !!}
         {!! $DatabaseUserName = '' !!}
         {!! $DatabasePassword = '' !!}
         {!! $DatabaseName     = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'Towns','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
          <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{$DatabaseId}}">
        @else
        {!! Form::open(array('url'=>'Towns','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        @endif
        {!! csrf_field() !!}
        
          <div class="row">

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Company:</label>

                  <div style="width:100%; display: flex;">

                    <select id="cc" name="cc" class="form-control select21">
                      <option value='0'> - </option>
                      @foreach($MasterUsers as $index=>$val)
                        <option {{ ($MasterUserId == $val->MasterUserId ? "selected": "")  }} value='{{$val->MasterUserId}}'> {{ $val->CompanyCode }} </option>
                      @endforeach
                    </select>

                  </div>
                  <div style="clear: both;"></div>

                </div>
                  
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Database Type:</label>
                  <input type="text" name="dbtype" id="dbtype" class="form-control input-sm GoSoftFinancialsForm" placeholder="dbtype" value="{{$DatabaseType}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Database Port:</label>
                  <input type="text" name="dbport" id="dbport" class="form-control input-sm GoSoftFinancialsForm" placeholder="dbport" value="{{$DatabasePort}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Database Host:</label>
                  <input type="text" name="dbhost" id="dbhost" class="form-control input-sm GoSoftFinancialsForm" placeholder="dbhost" value="{{$DatabaseHost}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Database User Name:</label>
                  <input type="text" name="dbuname" id="dbuname" class="form-control input-sm GoSoftFinancialsForm" placeholder="dbuname" value="{{$DatabaseUserName}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Database Password:</label>
                  <input type="text" name="dbpassword" id="dbpassword" class="form-control input-sm GoSoftFinancialsForm" placeholder="dbpassword" value="{{$DatabasePassword}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Database Name:</label>
                  <input type="text" name="dbname" id="dbname" class="form-control input-sm GoSoftFinancialsForm" placeholder="dbname" value="{{$DatabaseName}}">
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
              </div>
               
            </div>

        {!! Form::close() !!}

     @elseif($sAction == "ViewData")
      
     
      
      <table class="CustomeTable">
          <tr>
              <td> DatabaseType </td><td> {{ $DatabaseType }} </td>
          </tr>
          
          <tr>
              <td> DatabasePort: </td><td> {{ $DatabasePort }} </td>
          </tr>

          <tr>
              <td> DatabaseHost: </td><td> {{ $DatabaseHost }} </td>
          </tr>

          <tr>
              <td> DatabaseUserName: </td><td> {{ $DatabaseUserName }} </td>
          </tr>

          <tr>
              <td> DatabasePassword: </td><td> {{ $DatabasePassword }} </td>
          </tr>

          <tr>
              <td> DatabaseName: </td><td> {{ $DatabaseName }} </td>
          </tr>
          
          <tr>
              <td> Added On: </td><td> {{ date("F j, Y", strtotime($DatabaseCreatedOn)) . ' at ' . date("g:i a", strtotime($DatabaseCreatedOn)) }} </td>
          </tr>
          
          <tr>
              <td> Updated On: </td><td> {{ date("F j, Y", strtotime($DatabaseUpdatedOn)) . ' at ' . date("g:i a", strtotime($DatabaseUpdatedOn)) }} </td>
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

    if ($("#cc").val() && $("#dbtype").val() && $("#dbport").val() && $("#dbhost").val() && $("#dbuname").val() && $("#dbname").val())
    {  
        route = 'SystemMasterUserDB';
        $.ajax({
               type: 'post',
               url: 'SystemMasterUserDB',
               data: {
                   '_token'     : $('input[name=_token]').val(),
                   'cc'         : $('#cc').val(),
                   'dbtype'     : $('#dbtype').val(),
                   'dbport'     : $('#dbport').val(),
                   'dbhost'     : $('#dbhost').val(),
                   'dbuname'    : $('#dbuname').val(),
                   'dbpassword' : $('#dbpassword').val(),
                   'dbname'     : $('#dbname').val()
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

    if ($("#cc").val() && $("#dbtype").val() && $("#dbport").val() && $("#dbhost").val() && $("#dbuname").val() && $("#dbname").val())
    {
        var iId = $('#hiddenVal').val();
        
        route = 'SystemMasterUserDB';
        $.ajax(
        {
         type: 'PATCH',
         url: 'SystemMasterUserDB/'+iId,
         data:
         {
             '_token'     : $('input[name=_token]').val(),
             'cc'         : $('#cc').val(),
             'dbtype'     : $('#dbtype').val(),
             'dbport'     : $('#dbport').val(),
             'dbhost'     : $('#dbhost').val(),
             'dbuname'    : $('#dbuname').val(),
             'dbpassword' : $('#dbpassword').val(),
             'dbname'     : $('#dbname').val()
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
