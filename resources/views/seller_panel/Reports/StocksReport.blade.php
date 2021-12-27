@extends('barabrUserDashboard/layouts/forms')

@section('formcontent')

<style type="text/css">
.filer{
  max-width: 100%;
  border: 0px solid;
  border-style: inset;
  border-radius: 24px;
  border-color: gray;
  box-shadow: 5px 10px 18px #888888;
}
.title{
  color: purple;
  text-align: center;
  font-family: Monospace;
  font-weight: bold;
  line-height: 40px;
}
.ui-multiselect-filter input{
  color: gray;
  font-size: xx-small;
}
.ui-multiselect {
    color: purple;
    font-size: small;
    padding-left: 12px;
}

.fa-filter{
  font-size: 18px;
  color: purple;
  float:right;
  padding-right: 46px;
  cursor: pointer;
  margin-top: 8px;
}

.fa-refresh{
  font-size: 14px;
  color: purple;
  cursor: pointer;
}
.account-title{
  text-align: center;
  font-feature-settings: "tnum";
  font-variant-numeric: tabular-nums;
  font-variation-settings: 'wght' 50;
  font-weight: bold;
}
#AccountDetail{
  font-size: x-small;
  letter-spacing: 0.5px;
  border-left: 2px solid #3b5998;
  border-radius: 12px;
  padding-left: 12px;
}
.badge{
  float: none;
}
.badgeBtn{
    display: inline-block;
    padding: 10px 4px;
    font-size: x-small;
    color: #fff;
    line-height: 1;
    white-space: nowrap;
    text-align: center;
    border-radius: 6px;
    margin-top: 12px;
    margin-left: 2px;
    cursor: pointer;
}
.ellipsis
{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 90px;
  margin-right: -5px;
  cursor: pointer;
}
.KeepInRow{
  white-space: nowrap;
  overflow: hidden;
  cursor: pointer;
}
.float-leftDiv {
    float:left;
    width: -1px;
}
.DivControl{
	float: left;
	width: -1px;
}
a{
	color: purple;
}
input[type="checkbox"] {
  margin: 0px 4px 4px 2px;
  -ms-transform: scale(1); /* IE */
  -moz-transform: scale(1); /* FF */
  -webkit-transform: scale(1); /* Safari and Chrome */
  -o-transform: scale(1); /* Opera */
  transform: scale(1);
}
#ReportTitle{
  border-left: 1px solid #3b5998;
  border-right: 1px solid #3b5998;
  border-radius: 4px;
  background-color:#f5f5f5;
  max-width: 100%;
  width: 100%;
}
.ControlName{
  color: purple;
  background-color: #ADD8E6;
  font-weight: bold;
  padding: 8px;
  max-width: 100%;
  width: 100%;
}
.AccountsTitle{
  color: black;
  background-color: #E6E6FA;
  padding: 8px;
}
#ReportContent::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  border-radius: 10px;
  background-color: #F5F5F5;
}

#ReportContent::-webkit-scrollbar
{
  width: 12px;
  background-color: #F5F5F5;
}

#ReportContent::-webkit-scrollbar-thumb
{
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #555;
}

</style>

<!--- Criteria --->
<section class="content">
<div class="row well">

  <i class="fa fa-filter" aria-hidden="true" onclick="ShowHideCriteria();"></i>

  <div class="panel-body center-block filer" id="Criteria">

    {!! Form::open(array('url'=>'','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
    {!! csrf_field() !!}

    <div class="title">
      {{ $Module . ' - ' . $Component }}
    </div>

    <small>Note: <br />press <i class="fa fa-refresh" id="TownRefresh" aria-hidden="true" style="font-size: 12px;"></i> to populate selected data. </small>
    <br />
    <br />

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required">Towns</label>
          <div>
            <select multiple id="town" name="town" class="form-control">
                    @foreach($TownsList as $index=>$val)
                      <option value='{{$val->TownId}}'>{{$val->TownName}}</option>
                    @endforeach
            </select>
            <i class="fa fa-refresh" id="TownRefreshbtn" aria-hidden="true" onclick="getLocationList()"></i>
          </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required">Locations</label>
          <div>
            <select multiple id="location" name="location" class="form-control"> 
            </select>
            <i class="fa fa-refresh" id="LocationRefreshbtn" aria-hidden="true" onclick="getWorkerAccountsList()"></i>
          </div>
        </div>
    </div>

    <div class="col-md-12" id="stockstatus">
        <div class="form-group">
          <label for="placement" class="control-label" style="padding-bottom: 10px;">Available</label>
             <input type="checkbox" id="AvailableStocks" name="AvailableStocks" value="1" onchange="ShowWorker(this.value);" checked="">
             <label for="placement" class="control-label" style="padding-bottom: 10px;">Used</label>
             <input type="checkbox" id="UsedStocks" name="UsedStocks" value="0" onchange="ShowWorker(this.value);">
        </div>
    </div>

    <div class="col-md-12" style="display: none;" id="WorkerList">
        <div class="form-group">
          <label for="placement" class="control-label required">Worker Accounts</label>
          <div>
            <select multiple id="wa" name="wa" class="form-control" onchange="WAStatus(this.value);">
            </select>
          </div>
        </div>
    </div>

    <div class="col-md-12" id="fromdate" style="display: none;">
        <div class="form-group">
          <label for="placement" class="control-label required" style="padding-bottom: 10px;">From:</label>
             <input type="text" name="fdate" id="fdate" class="form-control input-group-sm" value="" style="width:180px; color: purple; height: 24px; background-color: #dfeffc; border: 1px solid #c5dbec; font-weight: bold;">
        </div>
    </div>

    <div class="col-md-12" id="todate" style="display: none;">
        <div class="form-group">
          <label for="placement" class="control-label required" style="padding-bottom: 10px;">To:</label>
             <input type="text" name="tdate" id="tdate" class="form-control input-group-sm" value="" style="width:180px; color: purple; height: 24px; background-color: #dfeffc; border: 1px solid #c5dbec; font-weight: bold;">
        </div>
    </div>

    <div class="title" style="padding-top: 4px;">
        <button type="button" class="button button-rounded button-highlight-flat hvr-pop" id="GenerateReport" name="GenerateReport">Generate</button>
    </div>

  {!! Form::close() !!}

  </div>
  
</div>
</section>
<!--- Closing Criteria --->

<section class="content" id="ReportTitle" style="display: none;">

  <div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-top: 12px;">
          <li class="breadcrumb-item"><a href="#">Report</a></li>
          <li class="breadcrumb-item"><a href="#">Stock Report</a></li>
        </ol>
    </nav>
  </div>

  <div class="row well" id="ReportContent" style="overflow: auto;">
    
  </div>
     
</section>

<script>

$(function() {
    d = new Date();
    $("#tdate").datepicker({ dateFormat: "dd-M-yy" }).val()
    $("#tdate").datepicker().datepicker("setDate", new Date());

    $("#fdate").datepicker({ dateFormat: "dd-M-yy" }).val()
    $("#fdate").datepicker().datepicker("setDate", d.getMonth()-30);
    $('.ui-datepicker').css('display','none');
 });

</script>

<script type="text/javascript">

function getLocationList(iSelectedLocationId="")
{
  iTownId = $("#town").val();

  if(iTownId != "" && iTownId != null)
  {
      $("#TownRefreshbtn").addClass("fa-spin");
      $.ajax({
           type: 'POST',
           url: 'getMultipleLocations',
           data: {
               '_token' : $('input[name=_token]').val(),
               'iTownId' : iTownId
              },
         success : function (sData)
         {
            $("#location option").remove();
            aLocations = JSON.parse(sData);
            if(aLocations.length > 0 )
              {   
                for(var s = 0; s < aLocations.length; s++)
                {
                    bSelectedFlag = "";
                    if(aLocations[s][0] == iSelectedLocationId)
                        bSelectedFlag = "selected";
                    $("#location").append("<option value=\'"+aLocations[s][0]+"\' "+bSelectedFlag+">"+aLocations[s][1]+"</option>");
                }
                $("#location").multiselect("refresh");
                $('.ui-multiselect').css('width', '180px');
                $('.ui-multiselect-menu').css('width', '280px');
              }
         },
        });

    $("#TownRefreshbtn").removeClass("fa-spin");
  }
}

function getWorkerAccountsList(iSelectedWorkerAccountsId="")
{
  
  iLocationId = $("#location").val();
  if(iLocationId != null && iLocationId != "")
  {
    $("#LocationRefreshbtn").addClass("fa-spin");
    $.ajax({
           type: 'POST',
           url: 'getMultipleWorkerAccounts',
           data: {
               '_token' : $('input[name=_token]').val(),
               'iLocationId' : iLocationId
              },
         success : function (sData)
         {
            $("#wa option").remove();
            aData = JSON.parse(sData);
            if(aData.length > 0 )
              {   
                for(var s = 0; s < aData.length; s++)
                {
                    bSelectedFlag = "";
                    if(aData[s][0] == iSelectedWorkerAccountsId)
                        bSelectedFlag = "selected";
                    $("#wa").append("<option value=\'"+aData[s][0]+"\' "+bSelectedFlag+">"+aData[s][1]+"</option>");
                }
                $("#wa").multiselect("refresh");
                $('.ui-multiselect').css('width', '180px');
                $('.ui-multiselect-menu').css('width', '280px');
              }
         },
        });
    $("#LocationRefreshbtn").removeClass("fa-spin");
  }
}

</script>

<script type="text/javascript">

  $("#ChartOfAccountsControl").multiselect().multiselectfilter();
  $("#town").multiselect().multiselectfilter();
  $("#location").multiselect().multiselectfilter();
  $("#wa").multiselect().multiselectfilter();
  $('.ui-multiselect').css('width', '180px');
  $('.ui-multiselect-menu').css('width', '280px');

</script>

<script>

$("#GenerateReport").click(function ()
{
    $("#GenerateReport").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#GenerateReport").attr("disabled", true);
    if ($("#town").val() && $("#town").val() != "")
    {  

      iChartOfAccountsControlId = $("#ChartOfAccountsControl").val();
      iTownId                   = $("#town").val();
      iLocationId               = $("#location").val();
      iWorkerAccountId          = $("#wa").val();
      dFromDate                 = $("#fdate").val();
      dToDate                   = $("#tdate").val();

      var iAvailableStocks = 0;
      var iUsedStocks    = 0;

      if($("#AvailableStocks").is(':checked'))
      {
        iAvailableStocks = 1;
      }
      if($("#UsedStocks").is(':checked'))
      {
        iUsedStocks = 1;
      }

      $.ajax({
           type: 'POST',
           url: 'StocksReport',
           data:
              {
               '_token'                    : $('input[name=_token]').val(),
               'iTownId'                   : iTownId,
               'iLocationId'               : iLocationId,
               'iWorkerAccountId'          : iWorkerAccountId,
               'dFromDate'                 : dFromDate,
               'dToDate'                   : dToDate,
               'iAvailableStocks'          : iAvailableStocks,
               'iUsedStocks'               : iUsedStocks,
              },
            cache   : false,
             success : function (sResponse)
             {
                var aMessage = sResponse.split("|");
                sMessagekey  = aMessage[0];
                sData        = aMessage[1];
                iUsedStocks  = aMessage[2];

                sData = decodedStringAtoB = atob(sData);

                aLedgerData = decodeURIComponent(sData.replace(/\+/g, ' '));
                aLedgerData = decodedStringAtoB = atob(aLedgerData);
                aLedgerData = JSON.parse(aLedgerData);

                $("#ReportTitle").fadeOut("fast");
                $("#ReportContent").html("");
                
                tTable = "";
                Sr = 1;
                var dGrandTotal = 0;

                if(iUsedStocks == 1)
                  {
                    tTable ='<table class="table table-borderless" width="100%">';

                    tTable +='<thead><tr style="font-weight: bold;"><th>Stock</th><th title="Used Quantity" class="ellipsis" onclick="ShowTitle($(this).text())">Used Quantity </th><th class="ellipsis"> Price </th></tr><tbody>';
                  }else
                  {
                    tTable ='<table class="table table-borderless" width="100%">';

                    tTable +='<thead><tr style="font-weight: bold;"><th>Stock</th><th title="Available Quantity" class="ellipsis" onclick="ShowTitle($(this).text())">Available Quantity</th><th class="ellipsis"> Price </th></tr><tbody>';
                  }

                for (var key in aLedgerData)
                {
                    var sControlName = "";

                    sStockCategoriesTitle    = aLedgerData[key]['StockCategoriesTitle'];

                    sWorkerAccountTitle      = aLedgerData[key]['WorkerAccountTitle'];

                    aStockSubCategoriesTitle = aLedgerData[key]['StockSubCategoriesTitle'];
                    aStockQuantity           = aLedgerData[key]['StockQuantity'];
                    aStockPrice              = aLedgerData[key]['StockPrice'];

                    if(iUsedStocks == 1)
                        {
                          tTable +='<tr>'+
                              '<td class="ControlName" colspan="3" class="ellipsis" onclick="ShowTitle($(this).text())">'+Sr+'. ' + sWorkerAccountTitle+'</td></tr>';
                        }else
                        {
                          tTable +='<tr'+
                              '<td colspan="3" class="ellipsis" onclick="ShowTitle($(this).text())">'+Sr+'. ' + sStockCategoriesTitle+'</td></tr>';
                        }

                    dSubTotal = 0;
                    for (var ATkey in aStockSubCategoriesTitle) 
                    {

                      sStockSubCategoriesTitle = aStockSubCategoriesTitle[ATkey];
                      dStockQuantity           = aStockQuantity[ATkey];
                      dStockPrice              = aStockPrice[ATkey];

                      if(iUsedStocks == 0)
                        dSubTotal += (dStockQuantity*dStockPrice); 
                      else
                        dSubTotal += dStockPrice;

                      if(iUsedStocks == 0)
                        dGrandTotal += (dStockQuantity*dStockPrice);
                      else
                        dGrandTotal += dStockPrice;

                      dStockPrice = addCommas(dStockPrice);

                      if(iUsedStocks == 1)
                      {
                        tTable += '<tr><td class="ellipsis" onclick="ShowTitle($(this).text())"> '+ sStockSubCategoriesTitle +' - '+ sStockCategoriesTitle +' </td><td class="ellipsis" onclick="ShowTitle($(this).text())"> '+ dStockQuantity +' </td><td class="ellipsis">Rs '+ dStockPrice +'</td></tr>';
                      }else
                      {
                        tTable += '<tr><td class="ellipsis" onclick="ShowTitle($(this).text())"> '+ sStockSubCategoriesTitle +' </td><td class="ellipsis" onclick="ShowTitle($(this).text())"> '+ dStockQuantity +' </td><td class="ellipsis">Rs '+ dStockPrice +'</td></tr>';
                      }
                    }

                    dSubTotal = addCommas(dSubTotal);

                    if(iUsedStocks == 1)
                      {
                        tTable += '<tr><td style="text-align: right;" class="KeepInRow" colspan="3">Sub Total: '+ dSubTotal +' </td></tr>';
                      }else
                      {
                        tTable += '<tr><td style="text-align: right;" class="KeepInRow" colspan="3">Sub Total: '+ dSubTotal +' </td></tr>';
                      }
                        
                    Sr++;
                }

                tTable +=
                          '</tbody>'+
                          '</table>';
                          
                dGrandTotal = addCommas(dGrandTotal);

                if(tTable.trim() != "")
                {
                  tTable += '<div class="AccountsTitle" style="float: right;"><strong>Total Rs. ' + dGrandTotal +'</strong></div>';
                }
                
                $("#ReportContent").append(tTable);
                
                if(sMessagekey == "success")
                  sMessage = "Report Loaded Successfully..!";
                else if(sMessagekey == "error")
                  sMessage = "something went wrong at our side please wait..!";

                if(tTable == "" && sMessagekey == "success")
                {
                  sMessage = "no data found..!";
                  sMessagekey = "info";
                }

                toastr[sMessagekey](sMessage, "Barabr Alert")
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

                if(tTable != "")
                {
                  $("#Criteria").toggle("slow");
                  $("#ReportTitle").fadeIn();
                  clearconsole();
                }
                
                $("#LoaderIcon").remove();
                $("#GenerateReport").removeAttr("disabled");
                
              
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
        $("#GenerateReport").removeAttr("disabled");

        return false;
    }
        
});

function ShowWorker(StockStatus)
{
  if($("#AvailableStocks").is(':checked') || $("#UsedStocks").is(':checked'))
  {
    if(StockStatus == 1)
    {
      $("#UsedStocks").attr("checked", false);
      $("#WorkerList").fadeOut("fast");
      $("#fromdate").fadeOut("fast");
      $("#todate").fadeOut("fast");
      $("#AvailableStocks").attr("checked", true);
    }else if(StockStatus == 0)
    {
      $("#WorkerList").fadeIn("fast");
      $("#fromdate").fadeIn("fast");
      $("#todate").fadeIn("fast");
      $("#AvailableStocks").attr("checked", false);
      $("#UsedStocks").attr("checked", true);
      getWorkerAccountsList();
    }
  }else
  {
    $("#UsedStocks").attr("checked", true);
    $("#AvailableStocks").attr("checked", true);
    $("#WorkerList").fadeOut("fast");
    $("#fromdate").fadeOut("fast");
    $("#todate").fadeOut("fast");
  }
  
}

function clearconsole() 
 {  
    
   if(window.console ) 
   {     
     console.clear();   
   } 
 } 

</script>

<script type="text/javascript">

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

function ShowTitle(sTitle){
  sTitle = sTitle.trim();
  if(sTitle != "" && sTitle != "-")
  {
    swal('Detail',sTitle);
  }
}

function ShowHideCriteria()
  {
    $("#Criteria").toggle("slow");
  }

function WAStatus(waid){
  if(waid != "")
  {
    $("#wastatus").fadeIn();
  }else
  {
    $("#ContinuedAccounts").prop("checked", false);
    $("#ClosedAccounts").prop("checked", false);
    $("#wastatus").fadeOut();
  }
}
</script>

@stop