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

    .Short {  
    width: 100%;  
    margin-top: 5px;  
    height: 3px;  
    color: #dc3545;  
    font-weight: 500;  
    font-size: 12px;  
    text-align: center;
    }  
    .Weak {  
        width: 100%;  
        margin-top: 5px;  
        height: 3px;  
        color: #ffc107;  
        font-weight: 500;  
        font-size: 12px; 
        text-align: center; 
    }  
    .Good {  
        width: 100%;  
        margin-top: 5px;  
        height: 3px;  
        color: #28a745;  
        font-weight: 500;  
        font-size: 12px; 
        text-align: center; 
    }  
    .Strong {  
        width: 100%;
        margin-top: 5px;  
        height: 3px;  
        color: #d39e00;  
        font-weight: 500;  
        font-size: 12px; 
        text-align: center; 
    }
    .glyphicon{
      top:4px;
      background-color: white;
      color: purple;
    }
  </style>

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Administration/Users/fa-unlock-alt/fa-user-plus', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{$UserName}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$UserName}} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $iUserId           = '' !!}
         {!!   $UserName          = '' !!}
         {!!   $UserPassword      = '' !!}
         {!!   $UserFullName      = '' !!}
         {!!   $UserEmail         = '' !!}
         {!!   $UserContactNumber = '' !!}
         {!!   $UserStatus        = '' !!}
         {!!   $CreatedOn         = '' !!}
         {!!   $CreatedBy         = '' !!}
         {!!   $UpdatedOn         = '' !!} 
         {!!   $UpdatedOn         = '' !!}
         {!!   $UserDesignationId = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'Users','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $UserId }}">
        @else
        {!! Form::open(array('url'=>'Users','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}

        <input type="hidden" name="hiddenVal" id="hiddenVal" value="0">

        @endif
        {!! csrf_field() !!}
        
          <div class="row">
              
            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">Designation:</label>

                  <div style="width:100%; display: flex;">

                    <select id="ud" name="ud" class="form-control select21 GoSoftFinancialsForm">
                      <option value='0'> - </option>
                      @foreach($UserDesignations as $index=>$val)
                        <option {{ ($UserDesignationId == $val->UserDesignationId ? "selected": "")  }} value=' {{ $val->UserDesignationId }} '> {{ $val->UserDesignation }} </option>
                      @endforeach
                    </select>

                  @if($sAction != "EditData")
                  <span class="input-group-btn">
                    <button style="background-color: white;" class="btn" type="button"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                  </span>
                  @endif

                  </div>
                  <div style="clear: both;"></div>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">User Name:</label>

                  <input type="text" name="uname" id="uname" class="form-control input-md input-xs GoSoftFinancialsForm input-sm" placeholder="User Name" value="{{$UserName}}" onblur="CheckDuplicate(this.value, 'UserName', 'Users', 'uinfo', 'name', $('#hiddenVal').val())">

                  <small class="help-block" data-bv-validator="UserName" data-bv-for="uname" data-bv-result="INVALID" style="display: none;" id="uinfo"></small>

                </div>
                  
            </div>
            
            <div class="col-md-12">
              
                <div class="form-group">
                  @if($sAction != "EditData")
                    <label for="placement" class="control-label required">User Password:</label>
                  @else
                    <label for="placement" class="control-label">User Password:</label>
                  @endif
                  <input type="password" name="upassword" id="upassword" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="******">

                  <small class="help-block" data-bv-validator="PasswordStrength" data-bv-for="password" data-bv-result="INVALID" style="display: none;" id="ps"></small>

                </div>
                  
            </div>
            

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label required">User Full Name:</label>

                  <input type="text" name="ufullname" id="ufullname" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="User Full Name" value="{{ $UserFullName }}">

                  <small class="help-block" data-bv-validator="UserFullName" data-bv-for="ufullname" data-bv-result="INVALID" style="display: none;" id="ufninfo"></small>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label">User Email:</label>

                  <input type="text" name="uemail" id="uemail" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="User Email" value="{{ $UserEmail }}" onblur="CheckDuplicate(this.value, 'UserEmail', 'Users', 'einfo', 'email', $('#hiddenVal').val())">
                  
                  <small class="help-block" data-bv-validator="UserEmail" data-bv-for="uemail" data-bv-result="INVALID" style="display: none;" id="einfo"></small>

                </div>
                  
            </div>

            <div class="col-md-12">
              
                <div class="form-group">

                  <label for="placement" class="control-label">User Contact Number:</label>

                  <input type="text" name="ucontactnumber" id="ucontactnumber" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="User Contact Number" value="{{ $UserContactNumber }}" onblur="CheckDuplicate(this.value, 'UserContactNumber', 'Users', 'cinfo', 'number', $('#hiddenVal').val())" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                  
                  <small class="help-block" data-bv-validator="UserContactNumber" data-bv-for="ucontactnumber" data-bv-result="INVALID" style="display: none;" id="cinfo"></small>

                </div>
                  
            </div>
          
                                                    
          <div class="col-md-12">
              
              <div class="form-group">

                <label for="placement" class="control-label">
                  Status:
                </label>

                <select id="status" name="status" class="form-control select21 GoSoftFinancialsForm">
                  @if($sAction == "EditData")
                  <option {{ ($UserStatus == 1 ? "selected": "")  }} value="1">Active</option>
                  <option {{ ($UserStatus == 0 ? "selected": "")  }} value="0">InActive</option>
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

              <?php 
              global $aUserRules;

              if(\Session::has('ud') && \Session::get('ud') != 0)
              {
                  if( !isset($aUserRules->UserDesignation) || $aUserRules->UserDesignation->Add == 0)
                      {
                      ?>
                      <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Designation</h4>
                </div>
                <div class="modal-body">
                  <div class="panel-body center-block" style="max-width: 70%;">
                    <div class="alert alert-info" style="background-color: #fbfbfd; border-color: #FF4500; color: black; font-family: scandia-web,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji!important; text-align: center; height: 200px;">
                      <i class="fa fa-ban fa-lg" aria-hidden="true" style="font-size: 50px; color: #FF4500; padding-bottom: 30px; margin-top: 16px;"></i>
                        <h3 style="color: #FF4500; font-style: italic;">Sorry..!<br />Access Denied </h3>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
                      <?php 
                    }
              }else
              { ?>
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

                        <input type="text" name="designation" id="designation" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="User Designation" required="">

                      </div>
                        
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="placement" class="control-label">
                          Status:
                        </label>
                        <select id="dstatus" name="dstatus" class="form-control select21 GoSoftFinancialsForm input-xs" style="width:100%">
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
              <?php 
              }

              ?>
            </div>
          </div>

        {!! Form::close() !!}
                  
   
     @elseif($sAction == "ViewData")
      
     
      
      <table class="CustomeTable">
          <tr>
              <td> Designation </td><td> {{ $UserDesignation }} </td>
          </tr>

          <tr>
              <td> User Name </td><td> {{ $UserName }} </td>
          </tr>

          <tr>
              <td> Password </td><td> ****** </td>
          </tr>

          <tr>
              <td> Full Name </td><td> {{ $UserFullName }} </td>
          </tr>

          <tr>
              <td> Email </td><td> {{ $UserEmail }} </td>
          </tr>
          
          <tr>
              <td> Contact No </td><td> {{ $UserContactNumber }} </td>
          </tr>

          <tr>
              <td> Status: </td><td> {{ $Status }} </td>
          </tr>
          
          <tr>
              <td> Added By: </td><td> {{ $RecordAddedBy }} </td>
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

    if($("#uinfo").html() != "" || ($("#ps").html() != "" && $("#ps").html() != "Weak" && $("#ps").html() != "Good" && $("#ps").html() != "Strong")  || $("#einfo").html() != "" || $("#cinfo").html() != "")
    {
      $("#LoaderIcon").remove();
      $("#ActionButton").removeAttr("disabled");
      return false;
    }

    if($("#ud").val() > 0 && $("#uname").val() && $("#upassword").val() && $("#ufullname").val())
    {  
            ierror = 0;
            sUserContactNumber = $("#ucontactnumber").val();
            sUserEmail = $("#uemail").val();
            sUserName = $("#uname").val();
            
          if(sUserContactNumber != "")
            {
              if(sUserContactNumber.length > 11 || sUserContactNumber.length < 11)
              {
                $("#cinfo").parent().addClass('has-error');
                $("#cinfo").html("number length should be 11");
                $("#cinfo").css("display", "block");

                key = "warning";
                sMessage = "number length should be 11";

                ierror++;

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                return false;

              }else
              {
                $("#cinfo").parent().removeClass('has-error');
                $("#cinfo").parent().addClass('has-success');
                $("#cinfo").css("display", "none");
                $("#cinfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;
              }
            }else
            {
              $("#cinfo").parent().removeClass('has-error');
              //$("#cinfo").parent().addClass('has-success');
              $("#cinfo").css("display", "none");
              $("#cinfo").empty();

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              ierror--;
            }

            if(sUserEmail != "")
            {
              var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

              if(sUserEmail.match(mailformat))
              {
                $("#einfo").parent().removeClass('has-error');
                $("#einfo").parent().addClass('has-success');
                $("#einfo").css("display", "none");
                $("#einfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;
              }else
              {
                $("#einfo").parent().addClass('has-error');
                $("#einfo").html("invalid email");
                $("#einfo").css("display", "block");

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                key = "warning";
                sMessage = "invalid email";
                ierror++;

                return false;
              }
            }
            else
            {
              $("#einfo").parent().removeClass('has-error');
              //$("#einfo").parent().addClass('has-success');
              $("#einfo").css("display", "none");
              $("#einfo").empty();

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              ierror--;
            }

            if(sUserName != "")
            {
              var UserNameformat = /^[0-9a-zA-Z]+$/;

              if(sUserName.match(UserNameformat) && sUserName.length >= 4)
              {
                $("#uinfo").parent().removeClass('has-error');
                $("#uinfo").parent().addClass('has-success');
                $("#uinfo").css("display", "none");
                $("#uinfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;

              }else
              {
                $("#uinfo").parent().addClass('has-error');
                if(sUserName.length <= 3)
                  $("#uinfo").html("maximum 4 characters are required");
                else
                  $("#uinfo").html("space & symbols are not allowed");
                $("#uinfo").css("display", "block");

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                key = "warning";
                if(sUserName.length <= 3)
                  sMessage = "maximum 4 characters are required";
                else
                  sMessage = "space & symbols are not allowed";
                ierror++;

                return false;
              }
            }
            else
            {
              $("#uinfo").parent().addClass('has-error');
              $("#uinfo").html("usernmae is required");
              $("#uinfo").css("display", "block");

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              key = "error";
              sMessage = "usernmae is required";
              ierror++;

              return false;
            }
        if(ierror <= 0)
        {
          route = 'Users';
          $.ajax({
               type: 'post',
               url: 'Users',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'ud' : $('#ud').val(),
                   'uname' : $('#uname').val(),
                   'upassword' : $('#upassword').val(),
                   'ufullname' : $('#ufullname').val(),
                   'uemail' : $('#uemail').val(),
                   'ucontactnumber' : $('#ucontactnumber').val(),
                   'st' : $('#status').val()
                  },
             success : function (msg)
             {

               var aMessage = msg.split("|");
              
               key = aMessage[0];

               sMessage = aMessage[1];

               iUserId = aMessage[2];

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
                  AjaxPage(route+'/'+iUserId, 'DivMainContainer');
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
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if($("#uinfo").html() != "" || (($("#ps").html() != "" && $("#upassword").val() != "") && $("#ps").html() != "Weak" && $("#ps").html() != "Good" && $("#ps").html() != "Strong")  || $("#einfo").html() != "" || $("#cinfo").html() != "")
    {
      $("#LoaderIcon").remove();
      $("#ActionButton").removeAttr("disabled");
      return false;
    }

    if($("#ud").val() > 0 && $("#uname").val() && $("#ufullname").val())
    {  
            ierror = 0;
            sUserContactNumber = $("#ucontactnumber").val();
            sUserEmail = $("#uemail").val();
            sUserName = $("#uname").val();
            
          if(sUserContactNumber != "")
            {
              if(sUserContactNumber.length > 11 || sUserContactNumber.length < 11)
              {
                $("#cinfo").parent().addClass('has-error');
                $("#cinfo").html("number length should be 11");
                $("#cinfo").css("display", "block");

                key = "warning";
                sMessage = "number length should be 11";

                ierror++;

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                return false;

              }else
              {
                $("#cinfo").parent().removeClass('has-error');
                $("#cinfo").parent().addClass('has-success');
                $("#cinfo").css("display", "none");
                $("#cinfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;
              }
            }else
            {
              $("#cinfo").parent().removeClass('has-error');
              //$("#cinfo").parent().addClass('has-success');
              $("#cinfo").css("display", "none");
              $("#cinfo").empty();

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              ierror--;
            }

            if(sUserEmail != "")
            {
              var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

              if(sUserEmail.match(mailformat))
              {
                $("#einfo").parent().removeClass('has-error');
                $("#einfo").parent().addClass('has-success');
                $("#einfo").css("display", "none");
                $("#einfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;
              }else
              {
                $("#einfo").parent().addClass('has-error');
                $("#einfo").html("invalid email");
                $("#einfo").css("display", "block");

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                key = "warning";
                sMessage = "invalid email";
                ierror++;

                return false;
              }
            }
            else
            {
              $("#einfo").parent().removeClass('has-error');
              //$("#einfo").parent().addClass('has-success');
              $("#einfo").css("display", "none");
              $("#einfo").empty();

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              ierror--;
            }

            if(sUserName != "")
            {
              var UserNameformat = /^[0-9a-zA-Z]+$/;

              if(sUserName.match(UserNameformat) && sUserName.length >= 4)
              {
                $("#uinfo").parent().removeClass('has-error');
                $("#uinfo").parent().addClass('has-success');
                $("#uinfo").css("display", "none");
                $("#uinfo").empty();

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                ierror--;

              }else
              {
                $("#uinfo").parent().addClass('has-error');
                if(sUserName.length <= 3)
                  $("#uinfo").html("maximum 4 characters are required");
                else
                  $("#uinfo").html("space & symbols are not allowed");
                $("#uinfo").css("display", "block");

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                key = "warning";
                if(sUserName.length <= 3)
                  sMessage = "maximum 4 characters are required";
                else
                  sMessage = "space & symbols are not allowed";
                ierror++;

                return false;
              }
            }
            else
            {
              $("#uinfo").parent().addClass('has-error');
              $("#uinfo").html("usernmae is required");
              $("#uinfo").css("display", "block");

              $("#LoaderIcon").remove();
              $("#ActionButton").removeAttr("disabled");

              key = "error";
              sMessage = "usernmae is required";
              ierror++;

              return false;
            }
        if(ierror <= 0)
        {
                var iId = $('#hiddenVal').val();
                route = 'Users';
                $.ajax(
                {
                 type: 'PATCH',
                 url: 'Users/'+iId,
                 data:{
                   '_token' : $('input[name=_token]').val(),
                   'ud' : $('#ud').val(),
                   'uname' : $('#uname').val(),
                   'upassword' : $('#upassword').val(),
                   'ufullname' : $('#ufullname').val(),
                   'uemail' : $('#uemail').val(),
                   'ucontactnumber' : $('#ucontactnumber').val(),
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
                  AjaxPage(route+'/'+iId, 'DivMainContainer');
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
  $("#ActionButtonAddUserDesignation").click(function ()
  {
    $("#ActionButtonAddUserDesignation").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButtonAddUserDesignation").attr("disabled", true);

    if ($("#designation").val())
    {  
        $.ajax({
               type: 'post',
               url: 'UserDesignation',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'UserDesignation' : $('#designation').val(),
                   'st' : $('#dstatus').val()
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

                  $('input[type="text"],textarea').val('');
                  
                  sData = "IDefaultId=0"+'&_token='+$('input[name=_token]').val();

                  AjaxFillList('getUserDesignation', sData, 'ud');
                }

                $("#LoaderIcon").remove();
                $("#ActionButtonAddUserDesignation").removeAttr("disabled");
                
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
          $("#ActionButtonAddUserDesignation").removeAttr("disabled");

          return false;
      }
     
  });
});
</script>

<script type="text/javascript">
  
  $(document).ready(function () {  
    $('#upassword').keyup(function () {  
        $('#ps').html(checkStrength($('#upassword').val()))  
    })  

    function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) { 
            $("#ps").css("display", "block"); 
            $('#ps').removeClass()  
            $('#ps').addClass('Short')
            $("#ps").parent().addClass('has-error');  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $("#ps").css("display", "block");
            $('#ps').removeClass()  
            $('#ps').addClass('Weak')
            $("#ps").parent().removeClass('has-error');
            $("#ps").parent().addClass('has-success');  
            return 'Weak'  
        } else if (strength == 2) {  
            $("#ps").css("display", "block");
            $('#ps').removeClass()  
            $('#ps').addClass('Good')  
            $("#ps").parent().removeClass('has-error');
            $("#ps").parent().addClass('has-success');  

            return 'Good'  
        } else {  
            $("#ps").css("display", "block");
            $('#ps').removeClass()  
            $('#ps').addClass('Strong')
            $("#ps").parent().removeClass('has-error');
            $("#ps").parent().addClass('has-success');    
            return 'Strong'  
        }  
    }  
});  

</script>

@stop