@extends('barabrUserDashboard/layouts/forms')

@section('formcontent')

<style type="text/css">
/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}
table, td, th
{  
	border: 1px solid #ddd;
	text-align: center;
	white-space: nowrap;
	color: purple;
	font-size: x-small;
  font-weight: bold;
  height: 24px;
}
table
{
  border-collapse: collapse;
  width: 100%;
}
th
{
  padding: 8px;
}

.css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}

.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}

.GJView {
    color: black;
    font-size: small;
    text-align: center;
    float: left;
    clear: both;
    height: 32px;
  }
.gjdataview{
  color: purple;
}
.ellipsis
{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 150px;
  margin-right: -5px;
  cursor: pointer;
}
</style>

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

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/Accounts/GeneralJournal/fa-book/fa-pencil-square-o', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{ $GeneralVoucherNo }} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;">Edit {{ $GeneralVoucherNo }} </div>
      @endif

      <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple; font-family: Arial, Helvetica, sans-serif;"> <span id="GV"></span> </div>


     <div class="panel-body center-block" style="max-width: 80%;">
         
        @if($sAction == "AddNewData" || $sAction == "EditData")
        
        @if($sAction == "AddNewData")

        {!!   $GeneralJournalId = '' !!}
        {!!   $TownId           = '' !!}
        {!!   $LocationId       = '' !!}
        {!!   $GeneralVoucherNo = '' !!}
        {!!   $TransactionDate  = '' !!}
        {!!   $TotalAmount      = '' !!}
        {!!   $CreatedOn        = '' !!}
        {!!   $CreatedBy        = '' !!}
        {!!   $UpdatedOn        = '' !!}
        {!!   $UpdatedBy        = '' !!}
        {!!   $TownName         = '' !!}

        @endif
         
         @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'GeneralJournal','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
          <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{$GeneralJournalId}}">
        @else
        {!! Form::open(array('url'=>'GeneralJournal','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        @endif
        {!! csrf_field() !!}
        <input type="hidden" name="gvno" id="gvno" value="{{$GeneralVoucherNo}}">
        <input type="hidden" name="actionValue" id="actionValue" value="{{$sAction}}">
          <div class="row">

            <div class="col-md-12">
                <div class="form-group">

                  <label for="placement" class="control-label required">Select Town:</label>

                  <select id="town" name="town" class="form-control select21 GoSoftFinancialsForm" style="width:80%" onchange="getSystemCode(this.value);">
                      <option value='0'> - </option>
                      @foreach($TownsList as $index=>$val)
                        <option {{($TownId==$val->TownId?"selected":"")}} value='{{$val->TownId}}'>{{$val->TownName}}</option>
                      @endforeach
                  </select>
                  <input type="hidden" value="{{$TownId}}" id="hiddenTown" name="hiddenTown">
                  <input type="hidden" value="{{$LocationId}}" id="hiddenLocation" name="hiddenLocation">

                  <input type="hidden" value="{{$TownId}}" id="constantTown" name="constantTown">
                  <input type="hidden" value="{{$LocationId}}" id="constantLocation" name="constantLocation">
                  <input type="hidden" value="{{$GeneralVoucherNo}}" id="constantGV" name="constantGV">

                </div>   
            </div>

            <div class="col-md-12">
              
                <div class="form-group">


                  <label for="placement" class="control-label required">Location:</label>

                  <select id="l" name="l" class="form-control select21 input-xs" style="width:80%" onchange="FetchEntryData(this.value);">
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

                  <label for="placement" class="control-label required">Transaction Date:</label>

                     <input type="text" name="tdate" id="tdate" class="form-control" value="{{$TransactionDate}}" style="width:80%">

                </div>
                 
            </div>


            <div class="col-md-12" id="style-1" style="overflow: auto;">
            	<div class="form-group">
            		<label for="placement" class="control-label required" style="font-weight: bold; color: purple; ">Entries:</label>
            			<small style="clear: both; display:block; width: 100%;"><b>Note:</b> press <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 11px; color: purple;"></i> to remove any entry</small>
	            	<table id="gjEntries" class="js-serial">
            			<thead>
            				<tr style="background-color: #E6E6FA; visibility: visible;">
                      <th>Sr.#</th>
            					<th>Chart Of Account</th>
            					<th>Description</th>
            					<th>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Worker Account &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</th>
                      <th>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Exp-Type &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</th>
            					<th> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Stock &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; </th>
            					<th>Stock Quantity</th>
            					<th> &nbsp;&nbsp; <i class="fa fa-long-arrow-up" aria-hidden="true"></i>DR/ <i class="fa fa-long-arrow-down" aria-hidden="true"></i>CR &nbsp;&nbsp; </th>
            				</tr>
            			</thead>
	            		<tbody>
                    <?php 
                      $aGJEData = json_decode(urldecode(bzdecompress(base64_decode($aGJEntries))));
                      $sGJEntriesHTML = $aGJEData->aEntryData;
                     ?>
	            			{!! $sGJEntriesHTML !!}
	            		</tbody>
	            	</table>
            	</div>
            	<div class="col-md-12">
	            	<div class="form-group">

	            		<a href="#" onclick="AddNewGJRow()" title="Add More"><img src="{{asset('public/assets/img/icon-plus.png')}}" style="width:18px; height: 18px;"></a>

	            		<label for="placement" class="control-label" style="font-weight: bold; color: purple; text-align: right; float: right;">Grand Total:
	            		<span id="gTotal">
		            		@if($sAction == "AddNewData")
		            			{{ '0.00' }}
		            		@else
		            			{{ number_format($TotalAmount) }}
		            		@endif
	            		</span>
	            		<span>/=</span></label>
	            	</div>
            	</div>
            </div>
            <div style="clear: both;"></div>               
           <div class="form-group form-actions">
               
              <div class="col-md-8 col-md-offset-4">
              @if($sAction == "AddNewData")
              <button type="button" id="ActionButton" name="ActionButton" class="button button-rounded button-highlight-flat hvr-pop" style="margin-top: 18px;">
              Add
              </button>
              @else
              <button type="button" id="ActionButtonEdit" name="ActionButtonEdit" class="button button-rounded button-highlight-flat hvr-pop" style="margin-top: 18px;">Update</button>
              @endif
              </div>
               
            </div>

        {!! Form::close() !!}
                  
   
     @elseif($sAction == "ViewData")
<div class="row">
    <div class="col-md-12">
       <div class="form-group">
        <div class="GJView">
          <span> Town : </span> <span style="padding-left: 22px;" class="gjdataview"> {{ $TownName }} </span>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <div class="GJView">    
          <span> Location : </span> <span class="gjdataview"> {{ $LocationTitle }} </span>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <div class="GJView">
          <span> Transaction Date : </span> <span class="gjdataview"> {{ date("F j, Y", strtotime($TransactionDate)) }} </span>
        </div>
      </div>
    </div>

    <div class="col-md-12" id="style-1" style="overflow: auto; clear: both;">
      <div class="form-group">
          <label for="placement" class="control-label" style="font-weight: bold; color: purple; ">Entries:</label>
        

      <table id="gjEntries" class="js-serial">
        <thead>
          <tr style="background-color: #E6E6FA; visibility: visible;">
            <th>Sr.#</th>
            <th>Chart Of Account</th>
            <th>Description</th>
            <th>Worker Account</th>
            <th>Exp-Type</th>
            <th> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Stock &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; </th>
            <th>Stock Quantity</th>
            <th> &nbsp;&nbsp; <i class="fa fa-long-arrow-up" aria-hidden="true"></i>DR/ <i class="fa fa-long-arrow-down" aria-hidden="true"></i>CR &nbsp;&nbsp; </th>
          </tr>
        </thead>
        <tbody>

          <?php $Sr = 1; ?>
          @foreach($aGJEntries as $key=>$val)

          <tr>
            <td> {{ $Sr++ }} </td>
            <td> {{ $val->AccountsTitle }} </td>
            <td class="ellipsis" onclick="ShowTitle($(this).text())"> {{ $val->ShortDescription }} </td>
            <td> 
              @if($val->WorkerAccountTitle == "")
              {{ '-' }}
              @else
              {{ $val->WorkerAccountTitle }} 
              @endif
            </td>
            <td> 
              @if($val->ExpenseTypeId == 0)
              {{ '-' }}
              @else
              {{ 'Worker Personal' }} 
              @endif
            </td>
            <td>
              @if($val->StockSubCategoriesTitle == "")
              {{ '-' }}
              @else
              {{ $val->StockSubCategoriesTitle }}
              @endif
            </td>
            <td>
              @if($val->StockQuantity <=0 || $val->StockQuantity == "")
              {{ '-' }}
              @else
              {{ $val->StockQuantity }}
              @endif
            </td>
            <td> {{ number_format($val->DRCR) }} </td>
          </tr>

          @endforeach
          <tr>
            <td colspan="8" style="text-align: right; padding: 2px; background-color: #E6E6FA">
            <span style="font-weight: bold; color: purple;"> Grand Total : </span>
            <span style="font-weight: bold; color: purple;"> {{ number_format($TotalAmount,2) }} </span></td>
          </tr>
        </tbody>
      </table>
      <div style="clear: both; padding: 12px;"></div>
      </div>

    </div>

  </div>
     
       @endif
     
     </div>

                                           
  </div>

<script>

$("#ActionButton").click(function ()
{
  swal({
        title: "are you sure?",
        text: "do you want to save this transaction!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, add!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: true,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm) {

          $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
          $("#ActionButton").attr("disabled", true);

          if ($("#town").val() && $("#town").val() > 0 && $("#l").val() && $("#l").val() > 0)
          {  
              route = 'GeneralJournal';
              iNumberOfVisibleRows = $('tr:visible').length;

              var aChartOfAccounts = new Array();
              var aDescriptions    = new Array();
              var aWorkerAccounts  = new Array();
              var aExpenseType     = new Array();
              var aStocks          = new Array();
              var aStocksQuantity  = new Array();
              var aDRCR            = new Array();

              iLocationId      = $("#l").val();
              dTransactionDate = $("#tdate").val();

              for(i=1;i<iNumberOfVisibleRows;i++)
              {
                $("#c"+i).css('border-bottom', 'solid 0px');
                $("#dc"+i).css('border-bottom', 'solid 0px');

                iChartOfAccountId = $("#sl"+i).val();
                dDRCR             = $("#dc"+i).val();

                if(iChartOfAccountId > 0 && (dDRCR == "" || dDRCR <= 0))
                {

                  toastr["error"]("add DR/ CR against Selected Chart Of Account", "Barabr alert")
                  toastr.options = 
                  {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": true,
                    "timeOut": "6000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                  
                  aChartOfAccounts = [];
                  aDescriptions    = [];
                  aWorkerAccounts  = [];
                  aExpenseType     = [];
                  aStocks          = [];
                  aStocksQuantity  = [];
                  aDRCR            = [];

                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");
                  $("#dc"+i).css('border-bottom', 'solid 1px red');
                  
                  return false;

                }else if((dDRCR > 0 && iChartOfAccountId <= 0))
                {

                  toastr["error"]("Select Chart Of Account against added DR/ CR", "Barabr alert")
                  toastr.options = 
                  {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": true,
                    "timeOut": "6000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }

                  $("#c"+i).css('border-bottom', 'solid 1px red');

                  aChartOfAccounts = [];
                  aDescriptions    = [];
                  aWorkerAccounts  = [];
                  aExpenseType     = [];
                  aStocks          = [];
                  aStocksQuantity  = [];
                  aDRCR            = [];

                  $("#LoaderIcon").remove();
                  $("#ActionButton").removeAttr("disabled");

                  return false;
                }

                if(iChartOfAccountId > 0 && dDRCR != "")
                {
                  aChartOfAccounts.push($("#sl"+i).val());
                  aDescriptions.push($("#desc"+i).val());
                  aWorkerAccounts.push($("#wa"+i).val());
                  aExpenseType.push($("#exptype"+i).val());
                  aStocks.push($("#stock"+i).val());
                  aStocksQuantity.push($("#sq"+i).val());
                  aDRCR.push($("#dc"+i).val());
                }
              }

              if(aChartOfAccounts.length > 0 && aDRCR.length > 0)
              {
                $.ajax({
                     type: 'post',
                     url: 'GeneralJournal',
                     data: {
                         '_token' : $('input[name=_token]').val(),
                         'l' : iLocationId,
                         'dTransactionDate' : dTransactionDate,
                         'aChartOfAccounts' : aChartOfAccounts,
                         'aDescriptions' : aDescriptions,
                         'aWorkerAccounts' : aWorkerAccounts,
                         'aExpenseType' : aExpenseType,
                         'aStocks' : aStocks,
                         'aStocksQuantity' : aStocksQuantity,
                         'aDRCR' : aDRCR,
                         'gTotal' : $("#gTotal").text(),
                         'GvNo' : $("#gvno").val()
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
                        "onclick": true,
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
              }else
              {
                toastr["error"]("add one record at least, to processed this", "Barabr Alert")
                toastr.options = 
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": true,
                  "timeOut": "6000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");
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
        } else {
          return false;
        }
      });
});

</script>

<script>

$("#ActionButtonEdit").click(function ()
{
  swal({
      title: "are you sure?",
      text: "do you want to update this transaction!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, update!",
      cancelButtonText: "No, cancel!",
      closeOnConfirm: true,
      closeOnCancel: true
    },
    function(isConfirm){
      if (isConfirm) {
        $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
        $("#ActionButton").attr("disabled", true);

        if ($("#town").val() && $("#town").val() > 0 && $("#l").val() && $("#l").val() > 0)
        {  
          var iId = $('#hiddenVal').val();
            route = 'GeneralJournal';
            iNumberOfVisibleRows = $('tr:visible').length;

            var aChartOfAccounts = new Array();
            var aDescriptions    = new Array();
            var aWorkerAccounts  = new Array();
            var aExpenseType     = new Array();
            var aStocks          = new Array();
            var aStocksQuantity  = new Array();
            var aDRCR            = new Array();

            var aPreviousaStocks         = new Array();
            var aPreviousaStocksQuantity = new Array();

            iLocationId      = $("#l").val();
            dTransactionDate = $("#tdate").val();

            for(i=1;i<iNumberOfVisibleRows;i++)
            {
              $("#c"+i).css('border-bottom', 'solid 0px');
              $("#dc"+i).css('border-bottom', 'solid 0px');

              iChartOfAccountId = $("#sl"+i).val();
              dDRCR             = $("#dc"+i).val();

              iPrevioushiddenstockid   = $("#hiddenstockid"+i).val();
              dPrevioushiddensquantity = $("#hiddensquantity"+i).val();

              if(iChartOfAccountId > 0 && (dDRCR == "" || dDRCR <= 0))
              {
                toastr["error"]("add DR/ CR against Selected Chart Of Account", "Barabr alert")
                toastr.options = 
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": true,
                  "timeOut": "6000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                $("#dc"+i).css('border-bottom', 'solid 1px red');

                aChartOfAccounts = [];
                aDescriptions    = [];
                aWorkerAccounts  = [];
                aExpenseType     = [];
                aStocks          = [];
                aStocksQuantity  = [];
                aDRCR            = [];
                aPreviousaStocks         = [];
                aPreviousaStocksQuantity = [];

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                return false;

              }else if((dDRCR > 0 && iChartOfAccountId <= 0))
              {
                toastr["error"]("Select Chart Of Account against added DR/ CR", "Barabr alert")
                toastr.options = 
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": true,
                  "timeOut": "6000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                $("#c"+i).css('border-bottom', 'solid 1px red');

                aChartOfAccounts = [];
                aDescriptions    = [];
                aWorkerAccounts  = [];
                aExpenseType     = [];
                aStocks          = [];
                aStocksQuantity  = [];
                aDRCR            = [];
                aPreviousaStocks         = [];
                aPreviousaStocksQuantity = [];

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

                return false;
              }

              if(iChartOfAccountId > 0 && dDRCR != "")
              {
                aChartOfAccounts.push($("#sl"+i).val());
                aDescriptions.push($("#desc"+i).val());
                aWorkerAccounts.push($("#wa"+i).val());
                aExpenseType.push($("#exptype"+i).val());
                aStocks.push($("#stock"+i).val());
                aStocksQuantity.push($("#sq"+i).val());
                aDRCR.push($("#dc"+i).val());

                if(iPrevioushiddenstockid > 0 && iPrevioushiddenstockid != "" && dPrevioushiddensquantity > 0 && dPrevioushiddensquantity != "")
                {
                  aPreviousaStocks.push($("#hiddenstockid"+i).val());
                  aPreviousaStocksQuantity.push($("#hiddensquantity"+i).val());
                }
              }
            }

            if(aChartOfAccounts.length > 0 && aDRCR.length > 0)
            {
              $.ajax({
                   type: 'PATCH',
                   url: 'GeneralJournal/'+iId,
                   data: {
                       '_token' : $('input[name=_token]').val(),
                       'l' : iLocationId,
                       'dTransactionDate' : dTransactionDate,
                       'aChartOfAccounts' : aChartOfAccounts,
                       'aDescriptions' : aDescriptions,
                       'aWorkerAccounts' : aWorkerAccounts,
                       'aExpenseType' : aExpenseType,
                       'aStocks' : aStocks,
                       'aStocksQuantity' : aStocksQuantity,
                       'aDRCR' : aDRCR,
                       'gTotal' : $("#gTotal").text(),
                       'GvNo' : $("#gvno").val(),
                       'aPreviousStocks' : aPreviousaStocks,
                       'aPreviousStocksQuantity' : aPreviousaStocksQuantity
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
                      "onclick": true,
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
            }else
            {
              toastr["error"]("add one record at least, to processed this", "Barabr Alert")
                toastr.options = 
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": true,
                  "timeOut": "6000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");
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
      } else {
        return false;
      }
    });
});
    
</script>

<script>

function getSystemCode(iTownId)
{

	w = 0; //Stock
	s = 0; //Quantity

	var previousValue = $("#hiddenTown").val();
  var previousLocation = $("#hiddenLocation").val();

  iNumber = $('tr:visible').length;

	arr = [];

	for( v = 1 ; v <= iNumber; v++ )
	{
		w = $("#wa"+v).val();
		s = $("#stock"+v).val();

		if(w != "" && w > 0)
		{
      arr.push(w);
		}

    if(s != "" && s > 0)
    {
      arr.push(s);
    }
		
	}

	if(arr.length > 0)
	{
	    swal({
		  title: "barabr alert?",
		  text: "Changing Town will affect on Worker Accounts and Stocks!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, Change!",
		  cancelButtonText: "No, cancel!",
		  closeOnConfirm: true,
		  closeOnCancel: true
		},
		function(isConfirm){
		  if (isConfirm) {
		    getGVNo(iTownId);
		    $("#hiddenTown").val(iTownId);
        $("#hiddenLocation").val(0);
        getLocationList(iTownId);
		  } else {
		    $("#town").val(previousValue).change();
        $("#l").val(previousLocation).change();
		  }
		});
	}else
	{
		getGVNo(iTownId);
		$("#hiddenTown").val(iTownId);
    $("#hiddenLocation").val(0);
    getLocationList(iTownId);
	}
}

function getGVNo(iTownId)
{
	$.ajax(
          {
           type: 'POST',
           url: 'getSystemCode',
           data:
            {
             '_token' : $('input[name=_token]').val(),
             'iTownId' : iTownId,
             'Component' : 'GeneralJournal'
            },
         success : function (msg)
         {
          sAction = $("#actionValue").val();
          if(sAction == "EditData")
          {
            iPreviousTown = $("#constantTown").val();
            if(iTownId == iPreviousTown)
            {
              sPreviousGV = $("#constantGV").val();
              $("#GV").html('');
              $("#gvno").val(sPreviousGV);
            }else
            {
              $("#GV").html("New GV : " + msg);
              $("#gvno").val(msg);
            }
          }else
          {
            $("#GV").html(msg);
            $("#gvno").val(msg);
          }
          
         },
        }
      );
}

function FetchEntryData(iLocationId)
{
    var previousLocation = $("#hiddenLocation").val();

    if(iLocationId != previousLocation && iLocationId != "-1")
    {
      w = 0; //Stock
      s = 0; //Quantity

      iNumber = $('tr:visible').length;

      arr = [];

      for( v = 1 ; v <= iNumber; v++ )
      {
        w = $("#wa"+v).val();
        s = $("#stock"+v).val();

        if(w != "" && w > 0)
        {
          arr.push(w);
        }

        if(s != "" && s > 0)
        {
          arr.push(s);
        }
        
      }

      if(arr.length > 0)
      {
          swal({
          title: "barabr alert?",
          text: "Changing Location will affect on Worker Accounts and Stocks!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Change!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {

            sData = "iLocationId="+iLocationId+'&_token='+$('input[name=_token]').val();
            AjaxFillList('getWorkerAccounts', sData, 'wa');

            sData = "iLocationId="+iLocationId+'&_token='+$('input[name=_token]').val();
            AjaxFillList('getStocks', sData, 'stock');
            $("#hiddenLocation").val(iLocationId);

            iNumber = $('tr:visible').length;
            iNumber = (iNumber+1);
            for(x=1; x < iNumber; x++)
             {
                $("#sq"+x).val("");
             }
             SetValue();
          } else {
            $("#l").val(previousLocation).change();
          }
        });
      }else
      {
        sData = "iLocationId="+iLocationId+'&_token='+$('input[name=_token]').val();
        AjaxFillList('getWorkerAccounts', sData, 'wa');

        sData = "iLocationId="+iLocationId+'&_token='+$('input[name=_token]').val();
        AjaxFillList('getStocks', sData, 'stock');
        $("#hiddenLocation").val(iLocationId);
        SetValue();
      }
    }
    
}

function FindValue(sqid)
{
    var sq = sqid.replace(/\D/g, "");

    iStockQuantity = $("#sq"+sq).val();
   	iStockId = $("#stock"+sq).val();

   	//GetValue
   	GrandTotal = 0;
    dPrice = 0;
    dAvailableStock = 0;

   	if(iStockQuantity != "" && iStockId > 0)
    {
      $.ajax
      (
          {
             type: 'POST',
             url: 'getStockValue',
             data:
              {
               '_token' : $('input[name=_token]').val(),
               'iStockId' : iStockId
              },
             success : function (sResponse)
            {
              if(iStockQuantity != "undefined" && iStockQuantity != "")
              {
                aResponse = sResponse.split("|");
                dPrice = parseFloat(aResponse[0]);
                dPrice = dPrice*iStockQuantity;
                
                dAvailableStock = aResponse[1];
                dCurrentGivenStockQ = $("#sq"+sq).val();

                if(dAvailableStock <= 0 && dCurrentGivenStockQ > 0)
                {
                  swal({
                    title: "Barabr alert",
                    text: "Stock is unavailable..!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Continue Anyway!",
                    cancelButtonText: "No, Cancel!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                  },
                  function(isConfirm){
                    if ( ! isConfirm) {
                        sAction = $("#actionValue").val();
                        if(sAction == "EditData")
                        {
                          var dPreviousStock = $("#hiddensq"+sq).val();
                          var dPreviousDC = $("#hiddendc"+sq).val();
                          $("#sq"+sq).val(dPreviousStock);
                          $("#dc"+sq).val(dPreviousDC);
                          SetValue();
                        }else
                        {
                          $("#stock"+sq).val('0').change();
                          $("#sq"+sq).val("");
                          $("#dc"+sq).val("");
                          SetValue();
                        }
                        
                    }
                  });
                }

                 $("#dc"+sq).val(dPrice);

                 var dGivienStocks = 0;
                 var dPreviousdGivienStocks = 0;

                 sAction = $("#actionValue").val();

                 tbodyRowCount = $('tr:visible').length;
                 tbodyRowCount = (tbodyRowCount+1);

                 for(x=1; x < tbodyRowCount; x++)
                 {
                    iSelectedStockId = $("#stock"+x).val();
                    if(iSelectedStockId == iStockId)
                    {
                      dGivenStockQuantity = $("#sq"+x).val();
                      if(dGivenStockQuantity > 0)
                      {
                        dGivienStocks+=parseInt(dGivenStockQuantity);
                      }
                      
                      if(sAction == "EditData")
                      {
                        dPreviousStock = $("#hiddensquantity"+x).val();
                        if(dPreviousStock > 0)
                        {
                          dPreviousdGivienStocks+=parseInt(dPreviousStock);
                        }
                      }
                    }
                 }
                 
                 if(sAction == "EditData")
                 {
                  dGivienStocks = (dGivienStocks-dPreviousdGivienStocks);
                 }

                iHiddenStockId   = 0;
                dHiddenSQuantity = 0;
                dHiddenDrCr      = 0;
                
                 if(dGivienStocks > dAvailableStock)
                    {
                      swal({
                        title: "Barabr alert",
                        text: "no more stock is available..!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Continue Anyway!",
                        cancelButtonText: "No, Cancel!",
                        closeOnConfirm: true,
                        closeOnCancel: true
                      },
                      function(isConfirm){
                        if ( ! isConfirm) {

                            sAction = $("#actionValue").val();

                            if(sAction == "EditData")
                            {
                              iHiddenStockId   = $("#hiddenstockid"+sq).val();
                              dHiddenSQuantity = $("#hiddensquantity"+sq).val();
                              dHiddenDrCr      = $("#hiddendc"+sq).val();

                              $("#sq"+sq).val("");
                              $("#dc"+sq).val("");

                              $("#stock"+sq).val(iHiddenStockId).change();
                              $("#sq"+sq).val(dHiddenSQuantity);
                              $("#dc"+sq).val(dHiddenDrCr);
                              SetValue();
                            }else
                            {
                              $("#stock"+sq).val('0').change();
                              $("#sq"+sq).val("");
                              $("#dc"+sq).val("");
                              SetValue();
                            }
                        }
                      });
                    }
                  SetValue();
              }
            },
          }
      );
    }else
    {
      $("#sq"+sq).val("");
    }
}

function RemoveGJRow(id)
{
  var id = id.replace( /^\D+/g, '');	
  if($('#sl'+id).prop('disabled') == true && $('#desc'+id).prop('disabled') == true && $('#dc'+id).prop('disabled') == true)
  {
    $('#sl'+id).prop('disabled', false);
    $('#desc'+id).prop('disabled', false);
    $('#exptype'+id).prop('disabled', false);
    $('#wa'+id).prop('disabled', false);
    $('#stock'+id).prop('disabled', false);
    $('#sq'+id).prop('disabled', false);
    $('#dc'+id).prop('disabled', false);
  }else
  {
    $('#sl'+id).val("0").change();
    $('#desc'+id).val("");
    $('#exptype'+id).val("0").change();
    $('#wa'+id).val("0").change();
    $('#stock'+id).val("0").change();
    $('#sq'+id).val("");
    $('#dc'+id).val("");

    $('#sl'+id).prop('disabled', true);
    $('#desc'+id).prop('disabled', true);
    $('#exptype'+id).prop('disabled', true);
    $('#wa'+id).prop('disabled', true);
    $('#stock'+id).prop('disabled', true);
    $('#sq'+id).prop('disabled', true);
    $('#dc'+id).prop('disabled', true);

    toastr["info"]("Entry has been cleared", "Barabr Alert")
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
  }
   SetValue(); 
}

function SetValue()
{
	GrandTotal = 0;

	iNumber = $('tr:visible').length;
	iNumber = (iNumber+1);
  $("#gTotal").text("0.00");
	for(x=1; x < iNumber; x++)
 	 {
 	 	  DrCR = $("#dc"+x).val();
 	 	  if(DrCR != "undefined" && DrCR != "")
 	 		 GrandTotal+=parseInt(DrCR);
 	 }

   if(GrandTotal > 0)
   {
    GrandTotal = addCommas(GrandTotal);
    $("#gTotal").text(GrandTotal);
   }else
   {
    $("#gTotal").text("0.00");
   }
 	
}

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function getLocationList(iTownId)
{
  iNumber = $('tr:visible').length;
  if(iTownId > 0)
  {
    sData = "iTownId="+iTownId+'&_token='+$('input[name=_token]').val();
      AjaxFillList('getLocations', sData, 'l');
    
    for(i=1; i<iNumber; i++)
    {
      $("#wa"+i).empty()
      .append('<option value="0" selected="selected" value="0">-</option>');
      $("#stock"+i).empty()
      .append('<option value="0" selected="selected" value="0">-</option>');
      $("#sq"+i).val("");
    }
    SetValue();
  }else
  {
    $("#l").empty()
      .append('<option value="0" selected="selected" value="0">-</option>');
    
    for(i=1; i<iNumber; i++)
    {
      $("#wa"+i).empty()
      .append('<option value="0" selected="selected" value="0">-</option>');
      $("#stock"+i).empty()
      .append('<option value="0" selected="selected" value="0">-</option>');
      $("#sq"+i).val("");
    }
    SetValue();
  }
}

function CheckChartOfAccountControl(id)
{
  var id = id.replace( /^\D+/g, '');
  iChartOfAccoutn = ($("#sl"+id).val());
  
  if(iChartOfAccoutn != "" && iChartOfAccoutn > 0)
    {
      $.ajax
      (
          {
            type: 'POST',
            url: 'CheckChartOfAccountControl', //Checking Chart Of Account Control
            data:
            {
              '_token' : $('input[name=_token]').val(),
              'iCheckChartOfAccountId' : iChartOfAccoutn
            },
             success : function (sResponse)
            {
              if(sResponse == 11 || sResponse == 12)
              {
                $("#stock"+id).val(0).change();
                $("#sq"+id).val(0).change();
                $("#exptype"+id).val(0).change();

                $('#stock'+id).prop('disabled', true);
                $('#sq'+id).prop('disabled', true);
                $('#exptype'+id).prop('disabled', true);

              }else if(sResponse == 6)
              {
                $('#stock'+id).prop('disabled', false);
                $('#sq'+id).prop('disabled', false);
                $('#exptype'+id).prop('disabled', true);
              }else
              {
                $('#stock'+id).prop('disabled', false);
                $('#sq'+id).prop('disabled', false);
                $('#exptype'+id).prop('disabled', false);
              }
            },
          }
      );
    }
}

$(function() {
    $("#tdate").datepicker({ dateFormat: "dd-M-yy" }).val()
    sAction = $("#actionValue").val();
    if(sAction != "EditData")
    {
    	$("#tdate").datepicker().datepicker("setDate", new Date());
    }
    $('.ui-datepicker').css('display','none');
 });

function ShowTitle(sTitle){
  swal('Description',sTitle);
}
</script>

@stop

