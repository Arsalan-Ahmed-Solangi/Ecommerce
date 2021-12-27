<style type="text/css">
	
</style>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">
           @php

            $sAddNew = 'Add New Record';
            $sView = 'View Record';
            $sUpdate = 'Update';

          @endphp

          @if($action == "AddNewRecord")
            {{ $sAddNew }}
          @elseif($action == "EditData")
            {{ $sUpdate }}
          @elseif($action == "ViewData")
            {{ $sView }}

          @endif
        </h3>
    </div>

      <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Accounts/ChartOfAccounts/fa-book/fa-book', 'DivMainContainer');" title="back"><img src="{{asset('/assets/img/back.png')}}" style="width:18px;"> Back </a></div>
 

      <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;">
        Category
      </div>

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($action == "AddNewRecord" || $action == "EditData")
        
        @if($action == "AddNewRecord")
        
         {!! $id          = '' !!}
         {!! $title       = '' !!}
         {!! $description = '' !!}
         {!! $iStatus     = '' !!}
         
        @endif
         
         @if($action == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'ChartOfAccounts','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
       <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $iChartOfAccountsId }}">
        @else
        {!! Form::open(array('url'=>'ChartOfAccounts','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        @endif
        {!! csrf_field() !!}
        
          <div class="row">
              
      
                  <div class="col-md-12">
              
                  <div class="form-group">

                    <label for="placement" class="control-label required">

                      Title
                    
                    </label>

                    <input type="text" name="ln[]" id="ln"
                         class="form-control input-md GoSoftFinancialsForm input-xs"
                         value="{{$title}}">
                  </div>
                  <div id="AppendTr"></div>
                         
                @if($action == "AddNewRecord")
                  <div id="addNewCRow">
                  <a href='javascript:void(0);' onclick="AddNewRow()" title="Add More"><i class="fa fa-plus-square" aria-hidden="true" style="font-size: 24px; color: #87ceeb;"></i></a>
                  </div>
                @endif
              </div>

              <div class="col-md-12">
                  <div class="form-group">
                    <label for="placement" class="control-label">

                      Sub Child Of
                    
                    </label>
                     {!! $sOptions !!}
                    </select>
                  </div>       
              </div>
                                                    
          <div class="col-md-12">
              <div class="form-group">
                <label for="placement" class="control-label">
                
                    Status
                </label>
                <select id="status" name="status" class="form-control select21">
                  @if($action == "EditData")
                    <option {{ ($iStatus == 1 ? "selected": "")  }} value="1">Active</option>
                    <option {{ ($iStatus == 0 ? "selected": "")  }} value="0">Inactive</option>
                  @else
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  @endif
                </select>
              </div>
          </div>

            <div class="col-md-12">
                  
              <div class="form-group">
                      
                  <label for="placement" class="control-label">
                        Description
                  </label>

                  <textarea id="description" name="description" rows="3"
                  class="form-control resize_vertical GoSoftFinancialsForm"
                  placeholder="Note">{{$description}}</textarea>
              
              </div>
              
            </div>

           <div class="form-group form-actions">
               
              <div class="col-md-8 col-md-offset-4">
              @if($action == "AddNewRecord")
              <button type="button" id="ActionButton" name="ActionButton" class="button button-rounded button-highlight-flat hvr-pop">
                
              Insert
              </button>
              @else
              <button type="button" id="ActionButtonEdit" name="ActionButtonEdit" class="button button-rounded button-highlight-flat hvr-pop">Update</button>
              @endif
              <!-- <button type="reset" class="button button-rounded btn btn-default" style="margin-top: 10px;">Reset</button> -->
              </div>
               
            </div>

        {!! Form::close() !!}
                  
   
     @elseif($action == "ViewData")
      
     
      
      <table class="CustomeTable">
          <tr>
              <td>
                
                @if(Lang() == 4)
                  Qism
                @elseif(Lang() == 3)
                  قسم
                @elseif(Lang() == 2)
                  قسم
                @else
                  Ledger Type
                @endif

              </td><td> {{ $ControlName->ControlName }} </td>
          </tr>
          
          <tr>
              <td>

                @if(Lang() == 4)
                  Code
                @elseif(Lang() == 3)
                  کوڈ 
                @elseif(Lang() == 2)
                  ڪوڊ 
                @else
                  Account Code
                @endif

              </td><td> {{ $Grids->ChartOfAccountsCode }} </td>
          </tr>
          
          <tr>
              <td>

                @if(Lang() == 4)
                  Naam
                @elseif(Lang() == 3)
                   عنوان
                @elseif(Lang() == 2)
                   عنوان
                @else
                  Account Title
                @endif

              </td><td> {{ $Grids->AccountsTitle }} </td>
          </tr>
          
          <tr>
              <td>

                @if(Lang() == 4)
                  Kisi Ky Matehat
                @elseif(Lang() == 3)
                  سب اکاؤنٹ
                @elseif(Lang() == 2)
                  جي ذيلي اڪائونٽ
                @else
                  Sub Account Of
                @endif

              </td><td> {{ $ParentChartOfAccount }} </td>
          </tr>
          
          <tr>
              <td>
                @if(Lang() == 4)
                  Status
                @elseif(Lang() == 3)
                  حالت
                @elseif(Lang() == 2)
                  حيثيت
                @else
                  Status
                @endif
              </td><td> @if($Grids->Status == 1) {{ 'Active' }} @else {{ 'InActive' }} @endif</td>
          </tr>
          
          <tr>
              <td>

                @if(Lang() == 4)
                  Note
                @elseif(Lang() == 3)
                  نوٹ
                @elseif(Lang() == 2)
                  نوٽ
                @else
                  Note
                @endif

              </td><td> {{ $Grids->Notes }} </td>
          </tr>
          
          <tr>
              <td>

                @if(Lang() == 4)
                  Shamil Kia
                @elseif(Lang() == 3)
                  نے شامل کیا
                @elseif(Lang() == 2)
                  طرفان شامل ڪيو ويو
                @else
                  Added By
                @endif

              </td><td> {{ $Grids->ChartOfAccountsAddedBy }} </td>
          </tr>
          
          <tr>
              <td>
                
                @if(Lang() == 4)
                  Shamil Ki Date
                @elseif(Lang() == 3)
                  پر شامل
                @elseif(Lang() == 2)
                  تي شامل ڪيو ويو
                @else
                  Added On
                @endif

              </td><td> {{ date("F j, Y", strtotime($Grids->ChartOfAccountsAddedOn)) . ' at ' . date("g:i a", strtotime($Grids->ChartOfAccountsAddedOn)) }} </td>
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
    var sTitle = 'are you sure?';
    var sText = 'do you want to add this record';

    swal({
      title: sTitle,
      text: sText,
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, Add",
      cancelButtonText: "Cancel",
      closeOnConfirm: true,
      closeOnCancel: true
    },
    function(isConfirm){
      if (isConfirm) {

    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if ($("#coac").val() && $("#ln").val())
    {
        
        var LN= new Array();
        $("input[name^='ln']").each(function(){
            LN.push($(this).val());
        });
        
        
        $.ajax({
               type: 'post',
               url: 'ChartOfAccounts',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'ln' : LN,
                   'slo' : $('#sl').val(),
                   'st' : $('#status').val(),
                   'description' : $('#description').val()
                  },
             success : function (msg)
             {

               if(msg == 'SUCCESS')
                {

                  toastr["success"]("Record added successfully", "Alert")

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

                  SelectSubLedger(0, iLedgerType);

                  $('input[type="text"],textarea').val('');

                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");
          
                }else if(msg == 'SpecialCharacters')
                {
                  toastr["warning"]("Special Characters are not allowed in fields except ._-", "Alert")

                  toastr.options =
                  {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "linear",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "slideUp"
                  }
                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");
                }else if(msg == "FAIL")
                {
                  toastr["info"]("Something went wrong please wait and try again", "Alert")

                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "linear",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "slideUp"
                  }
                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");
                }

             },
            });
      }
      else
      {

          toastr["error"]("fill in all the red star fields", "Alert")

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
    
    }

   });
  });
});
</script>



<script>
    
$('#ActionButtonEdit').click(function()
{
    var sTitle = 'are you sure?';
    var sText = 'do you want to Change this record';

    swal({
      title: sTitle,
      text: sText,
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, Update!",
      cancelButtonText: "No, cancel!",
      closeOnConfirm: true,
      closeOnCancel: true
    },
    function(isConfirm){
      if (isConfirm) {

    $("#ActionButtonEdit").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButtonEdit").attr("disabled", true);

    if ($("#coac").val() && $("#ln").val()) 
    {
        var iLedgerType = $('#LedgerType').val();
        var iId = $('#hiddenVal').val();
        route = 'ChartOfAccounts';
        $.ajax(
        {
         type: 'PATCH',
         url: 'ChartOfAccounts/'+iId,
         data:
         {
             '_token' : $('input[name=_token]').val(),
             'LedgerType' : $('#LedgerType').val(),
             'coac' : $('#coac').val(),
             'ln' : $('#ln').val(),
             'slo' : $('#sl').val(),
             'st' : $('#status').val(),
             'note' : $('#message').val()
         },
         success : function (msg)
            {
              if(msg == 'SUCCESS')
              {

                toastr["success"]("Record added successfully", "Alert")

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

                AjaxPage(route+'/'+iId, 'DivMainContainer');

                $("#LoaderIcon").remove();
                $("#ActionButtonEdit").removeAttr("disabled");
        
              }else if(msg == 'SpecialCharacters')
              {
                toastr["warning"]("Special Characters are not allowed in fields except ._-", "Alert")

                toastr.options =
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "linear",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "slideUp"
                }
                $("#LoaderIcon").remove();
                $("#ActionButtonEdit").removeAttr("disabled");
              }else if(msg == "FAIL")
              {
                toastr["info"]("Something went wrong please wait and try again", "Alert")

                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "linear",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "slideUp"
                }
                $("#LoaderIcon").remove();
                $("#ActionButtonEdit").removeAttr("disabled");
              }
              
           },
        });
    }
  else
  {
     toastr["error"]("fill in all the red star fields", "Alert")

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

  }

   });

});
    
</script>

<script>
  $(document).ready(function() {
    $(".select21").select2();
});
</script>

