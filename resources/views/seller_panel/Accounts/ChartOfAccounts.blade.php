@extends('barabrUserDashboard/layouts/forms')

@section('formcontent')
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-fw fa-star-half-empty"></i>
            @if($sAction == "AddNewData")
            Add New Chart Of Accounts
            @endif
            
            @if($sAction == "EditData")
            Edit Chart Of Account
            @endif
            @if($sAction == "ViewData")
            View Record
            @endif
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Accounts/ChartOfAccounts/fa-book/fa-book', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{$sAccountsTitle}} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$sAccountsTitle}} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">
         


        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")
        
         {!!   $iChartOfAccountsControlId = '' !!}
         {!!   $iChartOfAccountCode       = '' !!}
         {!!   $sAccountsTitle            = '' !!}
         {!!   $iStatus                   = '' !!}
         {!!   $sNotes                    = '' !!}
         {!!   $ChartOfAccountsAddedBy    = '' !!}
         
        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'ChartOfAccounts','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
       <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $iChartOfAccountsId }}">
        @else
        {!! Form::open(array('url'=>'ChartOfAccounts','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        @endif
        {!! csrf_field() !!}
        
          <div class="row">
              
              <div class="col-md-12">
                  
                  <div class="form-group">

                  <label for="placement" class="control-label">
                    Account Type:
                  </label>

                      <select id="LedgerType" name="LedgerType" class="form-control select2 select21 GoSoftFinancialsForm input-xs" style="width:100%" onchange="SelectSubLedger(0, this.value, $('#hiddenVal').val())">

                      @foreach($ChartOfAccountControllers as $Control)
                      <option  {{ ($iChartOfAccountsControlId == $Control->ChartOfAccountsControlId ? "selected": "")  }} value="{{ $Control->ChartOfAccountsControlId }}">{{ $Control->ControlName }}</option>
                      @endforeach
                      
                      </select>
                   
                  </div>
                    
              </div>
              
                  <div class="col-md-12">
              
                  <div class="form-group">
                    <label for="placement" class="control-label required">
                      Account Code/Title:
                    </label>

                    @if($sAction == "AddNewData")
                        <a href="#" onclick="AddNewRow()" title="Add More"><img src="{{asset('public/assets/img/icon-plus.png')}}" style="width:16px; height: 16px;"></a>
                    @endif

                        <input type="text" name="coac[]" id="coac"
                             class="form-control input-md GoSoftFinancialsForm input-xs"
                             placeholder="Account Code" value="{{$iChartOfAccountCode}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" max="11" min="1">

                        <input type="text" name="ln[]" id="ln"
                             class="form-control input-md GoSoftFinancialsForm input-xs"
                             placeholder="Account Title" value="{{$sAccountsTitle}}">


                  </div>
                  <div id="AppendTr"></div>
                         
                  
              </div>

              <div class="col-md-12">
                  
                    
                  <div class="form-group">

                  <label for="placement" class="control-label">
                    Sub Account Of:
                  </label>

                   {!! $sOptions !!}
                   
                  </select>
                  </div>
                          
          </div>
                                                    
          <div class="col-md-12">
              
              
              <div class="form-group">

              <label for="placement" class="control-label">
                Status:
              </label>

                  <select id="status" name="status" class="form-control select21 GoSoftFinancialsForm">
              @if($sAction == "EditData")
              <option {{ ($iStatus == 1 ? "selected": "")  }} value="1">Active</option>
              <option {{ ($iStatus == 0 ? "selected": "")  }} value="0">InActive</option>
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

                  <textarea id="message" name="message" rows="3"
                  class="form-control resize_vertical GoSoftFinancialsForm"
                  placeholder="Note">{{$sNotes}}</textarea>
              
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
              <td> Ledger Type: </td><td> {{ $ControlName->ControlName }} </td>
          </tr>
          
          <tr>
              <td> Chart Of Account Code: </td><td> {{ $Grids->ChartOfAccountsCode }} </td>
          </tr>
          
          <tr>
              <td> Ledger Name: </td><td> {{ $Grids->AccountsTitle }} </td>
          </tr>
          
          <tr>
              <td> Sub Ledger Of: </td><td> {{ $ParentChartOfAccount }} </td>
          </tr>
          
          <tr>
              <td> Status: </td><td> @if($Grids->Status == 1) {{ 'Active' }} @else {{ 'InActive' }} @endif</td>
          </tr>
          
          <tr>
              <td> Note: </td><td> {{ $Grids->Notes }} </td>
          </tr>
          
          <tr>
              <td> Added By: </td><td> {{ $Grids->ChartOfAccountsAddedBy }} </td>
          </tr>
          
          <tr>
              <td> Added On: </td><td> {{ date("F j, Y", strtotime($Grids->created_at)) . ' at ' . date("g:i a", strtotime($Grids->created_at)) }} </td>
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

    if ($("#coac").val() && $("#ln").val())
    {
        var iLedgerType = $('#LedgerType').val();
        
        var LN= new Array();
        $("input[name^='ln']").each(function(){
            LN.push($(this).val());
        });
        
         var LC= new Array();
        $("input[name^='coac']").each(function(){
            LC.push($(this).val());
        });
        
        $.ajax({
               type: 'post',
               url: 'ChartOfAccounts',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'LedgerType' : $('#LedgerType').val(),
                   'coac' : LC,
                   'ln' : LN,
                   'slo' : $('#sl').val(),
                   'st' : $('#status').val(),
                   'note' : $('#message').val()
                  },
             success : function (msg)
             {

               if(msg == 'SUCCESS')
                {

                  toastr["success"]("Record added successfully", "Barabr Alert")

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
                  toastr["warning"]("Special Characters are not allowed in fields except ._-", "Barabr Alert")

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
                  toastr["info"]("Something went wrong please wait and try again", "Barabr Alert")

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

                toastr["success"]("Record added successfully", "Barabr Alert")

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
                $("#ActionButton").removeAttr("disabled");
        
              }else if(msg == 'SpecialCharacters')
              {
                toastr["warning"]("Special Characters are not allowed in fields except ._-", "Barabr Alert")

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
                toastr["info"]("Something went wrong please wait and try again", "Barabr Alert")

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
