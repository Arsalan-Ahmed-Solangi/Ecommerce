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

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/BarabrSystemAdmin/MasterUsersSignUp/fa-cogs/fa-user-plus', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;">View {{$CompanyCode}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$CompanyCode}} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($sAction == "EditData")
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'MasterUsersSignUp','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
          <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{$MasterUserId}}">
        @endif
        {!! csrf_field() !!}
        
          <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Company:</label>
                  <input type="text" name="cc" id="cc" class="form-control input-sm GoSoftFinancialsForm" placeholder="cc" value="{{$CompanyCode}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Full Name:</label>
                  <input type="text" name="fname" id="fname" class="form-control input-sm GoSoftFinancialsForm" placeholder="fname" value="{{$FullName}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Status:</label>
                  <select name="status" id="status" class="form-control select21">
                    <option value="1" {{ ($Status == 1 ? "selected": "")  }}> Active </option>
                    <option value="0" {{ ($Status == 0 ? "selected": "")  }}> InActive </option>
                  </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Signed UP for:</label>
                  <select name="signupfor" id="signupfor" class="form-control select21">
                    <option value="1" {{ ($SignupFor == 1 ? "selected": "")  }}> One Year </option>
                    <option value="2" {{ ($SignupFor == 2 ? "selected": "")  }}> 6 Month </option>
                  </select>
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Workers:</label>
                  <input type="number" name="workers" id="workers" class="form-control" placeholder="workers" value="{{$Workers}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Contact Number:</label>
                  <input type="text" name="cnumber" id="cnumber" class="form-control input-sm GoSoftFinancialsForm" placeholder="cnumber" value="{{$ContactNumber}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Mobile Verification:</label>
                  <select id="mverification" name="mverification" class="form-control select21">
                    <option value="1" {{ ($MobileVerification == 1 ? "selected": "")  }}> Verified </option>
                    <option value="0" {{ ($MobileVerification == 0 ? "selected": "")  }}> Un-Verified </option>
                  </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">ConfigurationStatus:</label>
                    <select id="constatus" name="constatus" class="form-control select21">
                      <option value="1" {{ ($ConfigurationStatus == 1 ? "selected": "")  }}>Configured</option>
                      <option value="0" {{ ($ConfigurationStatus == 0 ? "selected": "")  }}>Pending</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">First Time Password Updated Status:</label>
                  <select id="ftpassword" name="ftpassword" class="form-control select21">
                      
                        <option {{ ($FirstTimePasswordUpdatedStatus == 1 ? "selected": "")  }} value='1'> Set </option>
                        <option {{ ($FirstTimePasswordUpdatedStatus == 0 ? "selected": "")  }} value='1'> Not Set </option>
                      
                    </select>
                </div>
            </div>

           <div class="form-group form-actions">
               
              <div class="col-md-8 col-md-offset-4">
             
              <button type="button" id="ActionButtonEdit" name="ActionButtonEdit" class="button button-rounded button-highlight-flat hvr-pop">Update</button>
         
              </div>
               
            </div>

        {!! Form::close() !!}

     @elseif($sAction == "ViewData")
      
     
      
      <table class="CustomeTable">
          <tr>
              <td> CompanyCode </td><td> {{ $CompanyCode }} </td>
          </tr>
          
          <tr>
              <td> FullName: </td><td> {{ $FullName }} </td>
          </tr>

          <tr>
              <td> Status: </td><td> {{ $Status }} </td>
          </tr>

          <tr>
              <td> SignupFor: </td><td> {{ $SignupFor }} </td>
          </tr>

          <tr>
              <td> Workers: </td><td> {{ $Workers }} </td>
          </tr>

          <tr>
              <td> ContactNumber: </td><td> {{ $ContactNumber }} </td>
          </tr>

          <tr>
              <td> MobileVerification: </td><td> {{ $MobileVerification }} </td>
          </tr>

          <tr>
              <td> ConfigurationStatus: </td><td> {{ $ConfigurationStatus }} </td>
          </tr>

          <tr>
              <td> FirstTimePasswordUpdatedStatus: </td><td> {{ $FirstTimePasswordUpdatedStatus }} </td>
          </tr>
          
          <tr>
              <td> Added On: </td><td> {{ date("F j, Y", strtotime($SignUpDateTime)) . ' at ' . date("g:i a", strtotime($SignUpDateTime)) }} </td>
          </tr>
          
          <tr>

              <td> Updated On: </td><td>
                @if($UpdatedDateTime != "")
               {{ date("F j, Y", strtotime($UpdatedDateTime)) . ' at ' . date("g:i a", strtotime($UpdatedDateTime)) }}
                @else
                {{ '--' }}
                @endif
              </td>
          </tr>
          
      </table>
      
     
       @endif
     
     </div>

                                           
  </div>

<script>
    
$('#ActionButtonEdit').click(function()
{
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if ($("#constatus").val() && $("#status").val())
    {
        var iId = $('#hiddenVal').val();
        
        route = 'MasterUsersSignUp';
        $.ajax(
        {
         type: 'PATCH',
         url: 'MasterUsersSignUp/'+iId,
         data:
         {
             '_token'    : $('input[name=_token]').val(),
             'constatus' : $('#constatus').val(),
             'status'    : $('#status').val(),
             'cnumber'   : $('#cnumber').val(),
             'fname'     : $('#fname').val(),
             'company'   : $('#cc').val()
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
